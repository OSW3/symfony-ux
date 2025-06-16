<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Enum\Size;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/base.twig')]
final class Brand extends Component
{
    public const NAME = "brand";
    // private bool $isChecked = false;

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'figures', getter: 'fetchFigures')]
    public array|string|null $figures;

    #[ExposeInTemplate(name: 'link', getter: 'fetchLink')]
    public ?string $link;

    #[ExposeInTemplate(name: 'hasHiddenText')]
    public bool $hasHiddenText;
    
    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public string|null|false $name;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public ?string $route;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $size;
    
    #[ExposeInTemplate(name: 'tag', getter: 'fetchTag')]
    public ?string $tag;
    
    #[ExposeInTemplate(name: 'tagline', getter: 'fetchTagline')]
    public string|null|false $tagline;
    
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public ?string $url;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('figures', $options['figures']);
        $resolver->setAllowedTypes('figures', ['array','string','null']);

        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string', 'bool']);

        $resolver->setDefault('hasHiddenText', $options['hasHiddenText']);
        $resolver->setAllowedTypes('hasHiddenText', ['bool']);

        $resolver->setDefault('size', $options['size']);
        $resolver->setAllowedTypes('size', 'string');
        $resolver->setAllowedValues('size', Size::toArray());

        $resolver->setDefault('tag', $options['tag']);
        $resolver->setAllowedTypes('tag', ['string']);

        $resolver->setDefault('tagline', $options['tagline']);
        $resolver->setAllowedTypes('tagline', ['null', 'string', 'bool']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string {
        $classList = $this->classList();

        if (in_array($this->size, Size::toArray()) && $this->size != Size::NORMAL->value) {
            $classList[] = "{$this->getComponentClassname()}-{$this->size}";
        }

        if ($this->hasHiddenText) {
            $classList[] = "{$this->getComponentClassname()}-hide-text";
        }

        return implode(" ", $classList);
    }

    public function fetchName(): ?string {
        $name = $this->name !== false ? trim($this->name ?? '') : null;
        $name = !empty($name) ? trim($name ?? '') : null;
        return $name;
    }

    public function fetchLink(): ?string {
        $options = $this->getConfig();
        $link = null;
        $url = null;
        $route = null;

        if (!empty($options['url'])) {
            $url = $options['url'];
        }
        if (!empty($this->url)) {
            $url = $this->url;
        }

        if (!empty($options['route'])) {
            $route = $options['route'];
        }
        if (!empty($this->route)) {
            $route = $this->route;
        }

        if (!empty($url)) {
            $link = $url;
        }
        if (!empty($route)) {
            $link = $this->urlGenerator->generate($route, [], UrlGenerator::ABSOLUTE_URL);
        }
        
        return $link;
    }

    public function fetchFigures(): array|string {
        $options = $this->getConfig();

        $figures = $this->figures;
        $figures = !empty($figures) ? $figures : $options['figures'];

        if (gettype($this->figures) === 'string') {
            $figures = ['main' => $figures];
        }
        
        return $figures;
    }

    public function fetchTag(): string {
        return $this->tag;
    }

    public function fetchTagline(): ?string {
        $tagline = $this->tagline !== false ? trim($this->tagline ?? '') : null;
        $tagline = !empty($tagline) ? trim($tagline ?? '') : null;
        return $tagline;
    }
}