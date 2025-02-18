<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Enum\Justify;
use OSW3\UX\Enum\Orientation;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use OSW3\UX\Service\SymbolsService;
use OSW3\UX\Trait\AttributeAriaTrait;
use OSW3\UX\Trait\AttributeStyleTrait;
use Symfony\Component\Filesystem\Path;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/symbols/base.twig')]
final class Symbols extends Component {
    public const NAME = "symbols";
    private $symbolsService;

    use DoNotExposeTrait;
    use AttributeIdTrait;

    #[ExposeInTemplate(name: 'symbols', getter: 'fetchSymbols')]
    public array $symbols;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();

        $this->symbolsService = new SymbolsService();
        $this->symbolsService->importFormDirectory( Path::join(__DIR__, '..', '..', '..', 'icons') );

        if ($options['path']) {
            $this->symbolsService->importFormDirectory( Path::join($this->getRootDir(), $options['path']) );
        }

        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
        ;

        $resolver->setDefault('symbols', []);
        $resolver->setAllowedTypes('symbols', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchSymbols(): array {
        return $this->symbolsService->getSymbols();
    }
}