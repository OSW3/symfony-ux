<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Enum\Size;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/brand/base.twig')]
final class Brand extends AbstractComponent
{
    public const NAME = "brand";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $size;
    
    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public ?string $name;
    
    #[ExposeInTemplate(name: 'tagline')]
    public ?string $tagline;
    
    #[ExposeInTemplate(name: 'link', getter: 'fetchLink')]
    public ?string $url;

    #[ExposeInTemplate(name: 'link', getter: 'fetchLink')]
    public ?string $route;
    
    #[ExposeInTemplate(name: 'logo', getter: 'fetchLogo')]
    public array|null $logo;

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

        $resolver->setDefault('size', $options['size']);
        $resolver->setAllowedTypes('size', 'string');
        $resolver->setAllowedValues('size', Size::toArray());

        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string']);

        $resolver->setDefault('tagline', $options['tagline']);
        $resolver->setAllowedTypes('tagline', ['null', 'string']);

        $resolver->setDefault('url', "");
        $resolver->setAllowedTypes('url', ['null', 'string']);

        $resolver->setDefault('route', "");
        $resolver->setAllowedTypes('route', ['null', 'string']);

        $resolver->setDefault('logo', $options['logo']);
        $resolver->setAllowedTypes('logo', ['array','null']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if (in_array($this->size, Size::toArray()) && $this->size != Size::NORMAL->value)
        {
            $classList[] = "{$this->getComponentClassname()}-{$this->size}";
        }

        return implode(" ", $classList);
    }

    public function fetchName(): ?string
    {
        $options = $this->getConfig();
        $name = null;

        if (!empty($options['name'])) {
            $name = $options['name'];
        }

        if (!empty($this->name)) {
            $name = $this->name;
        }

        return trim($name);
    }

    public function fetchLink(): ?string
    {
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

    public function fetchLogo(): array 
    {
        $options = $this->getConfig();
        return !empty($this->logo) ? $this->logo : $options['logo'];
    }
}