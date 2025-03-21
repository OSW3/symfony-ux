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

#[AsTwigComponent(template: '@SymfonyUx/media/video.twig')]
final class Video extends Component
{
    public const NAME = "video";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string|array $src;
    
    #[ExposeInTemplate(name: 'sources', getter: 'fetchSource')]
    public array $sources;

    #[ExposeInTemplate(name: 'controls', getter: 'controls')]
    public string $controls;

    #[ExposeInTemplate(name: 'loop', getter: 'loop')]
    public string $loop;

    #[ExposeInTemplate(name: 'autoplay', getter: 'autoplay')]
    public string $autoplay;

    #[ExposeInTemplate(name: 'muted', getter: 'muted')]
    public string $muted;

    #[ExposeInTemplate(name: 'playsinline', getter: 'playsinline')]
    public string $playsinline;

    #[ExposeInTemplate(name: 'preload')]
    public string $preload;

    #[ExposeInTemplate(name: 'volume')]
    public int|string|null $volume;

    #[ExposeInTemplate(name: 'poster')]
    public string|null $poster;

    #[ExposeInTemplate(name: 'unsupported')]
    public string $unsupported;

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

        $resolver->setDefault('sources', []);
        $resolver->setAllowedTypes('sources', ['array']);

        $resolver->setDefault('controls', 'yes');
        $resolver->setAllowedValues('controls', ['yes', 'no']);
        $resolver->setAllowedTypes('controls', ['string']);

        $resolver->setDefault('loop', 'no');
        $resolver->setAllowedValues('loop', ['yes', 'no']);
        $resolver->setAllowedTypes('loop', ['string']);

        $resolver->setDefault('autoplay', 'no');
        $resolver->setAllowedValues('autoplay', ['yes', 'no']);
        $resolver->setAllowedTypes('autoplay', ['string']);

        $resolver->setDefault('muted', 'yes');
        $resolver->setAllowedValues('muted', ['yes', 'no']);
        $resolver->setAllowedTypes('muted', ['string']);

        $resolver->setDefault('playsinline', 'yes');
        $resolver->setAllowedValues('playsinline', ['yes', 'no']);
        $resolver->setAllowedTypes('playsinline', ['string']);

        $resolver->setDefault('preload', 'auto');
        $resolver->setAllowedValues('preload', ['auto', 'metadata', 'none']);
        $resolver->setAllowedTypes('preload', ['string']);

        $resolver->setDefault('volume', null);
        $resolver->setAllowedTypes('volume', ['integer','string','null']);

        $resolver->setDefault('poster', null);
        $resolver->setAllowedTypes('poster', ['string', 'null']);

        $resolver->setDefault('unsupported', "Your browser does not support the video element.");
        $resolver->setAllowedTypes('unsupported', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchSource(): array {
        $mimeTypes = [
            'mp4'  => 'video/mp4',
            'm4v'  => 'video/x-m4v',
            'webm' => 'video/webm',
            'ogv'  => 'video/ogg',
            'mov'  => 'video/quicktime',
            'avi'  => 'video/x-msvideo',
            'wmv'  => 'video/x-ms-wmv',
            'flv'  => 'video/x-flv',
            'mkv'  => 'video/x-matroska',
        ];
        

        // Force $src to be an array
        $sources = (array) $this->src;

        foreach ($sources as &$source) {
            if (is_string($source)) {
                $source = ['src' => $source];
            }

            $extension = pathinfo($source['src'], PATHINFO_EXTENSION);
            $source['type'] = $mimeTypes[$extension] ?? 'application/octet-stream';
        }

        return $sources;
    }

    public function controls(): bool {
        return $this->controls === 'yes';
    }

    public function loop(): bool {
        return $this->loop === 'yes';
    }

    public function autoplay(): bool {
        return $this->autoplay === 'yes';
    }

    public function muted(): bool {
        return $this->muted === 'yes';
    }

    public function playsinline(): bool {
        return $this->playsinline === 'yes';
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);

        if ($this->volume) {
            $volume = $this->volume / 100;
            if ($volume > 1) {
                $volume = 1;
            }
            $dataset["volume"] = $volume;
        }
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}