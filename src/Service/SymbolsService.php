<?php 
namespace OSW3\UX\Service;

use Symfony\Component\Filesystem\Path;
use Symfony\Component\DomCrawler\Crawler;

class SymbolsService {
    
    private array $symbols = [];

    public function __construct(){}

    public function importFormDirectory(string $directory): void {

        if (!is_dir($directory)) {
            return;
        }

        $entries = scandir($directory);
        $entries = array_filter($entries, fn($entry) => str_ends_with($entry, '.svg'));

        array_map(function($filename) use ($directory) {
            $filepath = Path::join($directory, $filename);
            $xml = file_get_contents($filepath);
            $xml = preg_replace('/<\?xml.*?\?>|<!DOCTYPE[^>]+>/', '', $xml);

            $crawler = new Crawler($xml);
            
            $symbol = [];
            $symbol['id']      = str_replace(".svg", "", $filename);
            $symbol['viewbox'] = $crawler->filter('[viewBox]')->each(fn (Crawler $node) => $node->attr('viewbox') )[0] ?? null;
            $symbol['content'] = $crawler->filter('svg')->each(fn (Crawler $node) => $symbol['content'] = preg_replace(
                array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),
                array('',' '),
                str_replace(array("\n","\r","\t"),'',
                $node->html())
            ) )[0] ?? null;

            array_push($this->symbols, $symbol);
        }, $entries);
    }

    public function getSymbols(): array {
        return $this->symbols;
    }
}