<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/media/pdf.twig')]
final class Pdf extends Component
{
    public const NAME = "pdf";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'src', getter: 'fetchSrc')]
    public string $src;
    
    // #[ExposeInTemplate(name: 'sources', getter: 'fetchSource')]
    // public array $sources;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $controls;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $orientation;

    // #[ExposeInTemplate(name: 'autoplay', getter: 'autoplay')]
    // public string $autoplay;

    // #[ExposeInTemplate(name: 'muted', getter: 'muted')]
    // public string $muted;

    // #[ExposeInTemplate(name: 'playsinline', getter: 'playsinline')]
    // public string $playsinline;

    // #[ExposeInTemplate(name: 'preload')]
    // public string $preload;

    // #[ExposeInTemplate(name: 'volume')]
    // public int|string|null $volume;

    // #[ExposeInTemplate(name: 'poster')]
    // public string|null $poster;

    // #[ExposeInTemplate(name: 'unsupported')]
    // public string $unsupported;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setRequired('src');
        $resolver->setAllowedTypes('src', ['string', 'array']);

        // $resolver->setDefault('sources', []);
        // $resolver->setAllowedTypes('sources', ['array']);

        $resolver->setDefault('controls', 'yes');
        $resolver->setAllowedValues('controls', ['yes', 'no']);
        $resolver->setAllowedTypes('controls', ['string']);

        $resolver->setDefault('orientation', 'portrait');
        $resolver->setAllowedValues('orientation', ['portrait', 'landscape']);
        $resolver->setAllowedTypes('orientation', ['string']);

        // $resolver->setDefault('autoplay', 'no');
        // $resolver->setAllowedValues('autoplay', ['yes', 'no']);
        // $resolver->setAllowedTypes('autoplay', ['string']);

        // $resolver->setDefault('muted', 'yes');
        // $resolver->setAllowedValues('muted', ['yes', 'no']);
        // $resolver->setAllowedTypes('muted', ['string']);

        // $resolver->setDefault('playsinline', 'yes');
        // $resolver->setAllowedValues('playsinline', ['yes', 'no']);
        // $resolver->setAllowedTypes('playsinline', ['string']);

        // $resolver->setDefault('preload', 'auto');
        // $resolver->setAllowedValues('preload', ['auto', 'metadata', 'none']);
        // $resolver->setAllowedTypes('preload', ['string']);

        // $resolver->setDefault('volume', null);
        // $resolver->setAllowedTypes('volume', ['integer','string','null']);

        // $resolver->setDefault('poster', null);
        // $resolver->setAllowedTypes('poster', ['string', 'null']);

        // $resolver->setDefault('unsupported', "Your browser does not support the pdf element.");
        // $resolver->setAllowedTypes('unsupported', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchSrc(): string {
        return $this->controls === 'no'
            ? "{$this->src}#toolbar=0&navpanes=0&scrollbar=0"
            : $this->src
        ;
    }

    // public function controls(): bool {
    //     return $this->controls === 'yes';
    // }

    // public function loop(): bool {
    //     return $this->loop === 'yes';
    // }

    // public function autoplay(): bool {
    //     return $this->autoplay === 'yes';
    // }

    // public function muted(): bool {
    //     return $this->muted === 'yes';
    // }

    // public function playsinline(): bool {
    //     return $this->playsinline === 'yes';
    // }

    public function fetchDataset(): array {
        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);

        $dataset["orientation"] = $this->orientation;
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}