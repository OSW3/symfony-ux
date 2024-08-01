<?php 

namespace OSW3\UX\Command;

use Symfony\Component\Filesystem\Path;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BuildCommand extends Command
{
    protected static $defaultName = 'ux:build';
    private array $options;

    public function __construct(ParameterBagInterface $params)
    {
        $options = $params->all();
        $this->options = $options[Configuration::NAME];

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Export Symfony parameters to SCSS variables');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io              = new SymfonyStyle($input, $output);
        $sassVarDir      = Path::join(__DIR__, "../../", "assets/sass/variables");
        $sassVariables   = [];
        $sassVariables[] = "// Last gen: ". date("Y-m-d H:i:s");



        foreach ($this->options['layout'] as $name => $value)
        {
            $property = str_replace("_", "-", $name);

            switch ($name)
            {
                case 'grid_divisions':
                default: 
                    $sassVariables[] = "\${$property}: {$value};";
            }
        }



        file_put_contents("{$sassVarDir}/_generated.scss", implode("\n", $sassVariables));
        $io->success("SCSS variables exported successfully.");

        return Command::SUCCESS;
    }
}
