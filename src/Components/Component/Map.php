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
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent(template: '@SymfonyUx/map/base.twig')]
class Map extends Component
{
    public const NAME = "map";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'href')]
    public string $href;

    #[ExposeInTemplate(name: 'src', getter: 'fetchSrc')]
    public string $src;

    #[ExposeInTemplate(name: 'provider', getter: 'fetchProvider')]
    public string|null $provider;

    #[ExposeInTemplate(name: 'zoom', getter: 'fetchZoom')]
    public int|float|string|null $zoom;

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

        $resolver->setDefaults(['href' => '']);
        $resolver->setAllowedTypes('href', ['string']);

        $resolver->setDefaults(['provider' => null]);
        $resolver->setAllowedTypes('provider', ['string', 'null']);

        $resolver->setDefaults(['zoom' => null]);
        $resolver->setAllowedTypes('zoom', ['int','float','string','null']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchProvider(): string|null {
        if (empty($this->provider)) {
            $this->provider = $this->guessProvider();
        }
        return $this->provider;
    }

    public function fetchSrc(): string {
        return match ($this->guessProvider()) {
            'google'   => preg_replace('/!4f([\d.]+)/', '!4f%zoom%', $this->href),
            'maptiler' => preg_replace('/#([\d.]+)/', '#%zoom%', $this->href),
            default => $this->href
        };
    }

    public function fetchZoom(): int|float|string|null {
        if (!empty($this->zoom)) {
            return $this->zoom;
        }

        return match ($this->guessProvider()) {
            'google'   => preg_replace('/.*!4f([\d.]+).*/', '$1', $this->href),
            'maptiler' => preg_replace('/.*#([\d.]+)\/([\d.]+)\/([\d.]+)/', '$1', $this->href),
            default => 123
        };
    }

    private function guessProvider(): string|null {
        if (preg_match('/^https:\/\/www\.google\.com\/maps/', $this->href)) {
            return "google";
        }
        elseif (preg_match('/^https:\/\/api\.maptiler\.com\/maps/', $this->href)) {
            return "maptiler";
        }
        
        return null;
    }
}