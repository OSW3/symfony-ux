<?php 
namespace OSW3\UX\Components\Component\Nav;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/nav/item.twig')]
final class Item extends Component {
    public const NAME = "nav-item";

    use DoNotExposeTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'label')]
    public string|null $label;
    
    #[ExposeInTemplate(name: 'url', getter: 'fetchUrl')]
    public string|null $url;
    
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string|null $route;
    
    #[ExposeInTemplate(name: 'icon')]
    public string|null $icon;
    
    #[ExposeInTemplate(name: 'target')]
    public string $target;

    #[ExposeInTemplate(name: 'isActive')]
    public bool $isActive;
    
    #[ExposeInTemplate(name: 'isDisabled')]
    public bool $isDisabled;
    
    #[ExposeInTemplate(name: 'children', getter: 'fetchChildren')]
    public array $children;
    
    #[ExposeInTemplate(name: 'placement')]
    public string|null $placement;
    
    #[ExposeInTemplate(name: 'alignment')]
    public string|null $alignment;

    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('label', null);
        $resolver->setAllowedTypes('label', ['string', 'null']);

        $resolver->setDefault('url', null);
        $resolver->setAllowedTypes('url', ['string', 'null']);

        $resolver->setDefault('route', null);
        $resolver->setAllowedTypes('route', ['string', 'null']);

        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string']);

        $resolver->setDefault('target', "_self");
        $resolver->setAllowedTypes('target', ['string']);

        $resolver->setDefault('isActive', false);
        $resolver->setAllowedTypes('isActive', ['boolean']);

        $resolver->setDefault('isDisabled', false);
        $resolver->setAllowedTypes('isDisabled', ['boolean']);

        $resolver->setDefault('children', []);
        $resolver->setAllowedTypes('children', ['array']);

        $resolver->setDefault('placement', null);
        $resolver->setAllowedTypes('placement', ['string', 'null']);

        $resolver->setDefault('alignment', null);
        $resolver->setAllowedTypes('alignment', ['string', 'null']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if (!empty($this->children)) {
            $classList[] = "{$this->prefix}has-subnav";
        }

        return implode(" ", $classList);
    }

    public function fetchDataset(): array
    {
        $dataset = [];

        if ($this->placement) $dataset['placement'] = $this->placement;
        if ($this->alignment && $this->placement != 'right' && $this->placement != 'left') $dataset['alignment'] = $this->alignment;
        
        foreach ($dataset as $property => $value) {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }

    public function fetchUrl(): string {
        if (!empty($this->route)) {
            $this->url = $this->urlGenerator->generate($this->route);
        }

        return $this->url;
    }

    public function fetchChildren(): array {
        // if (!empty($this->children) && empty($this->placement)) {

        // }

        $this->placement = !empty($this->children) && empty($this->placement) ? 'bottom' : $this->placement;

        return $this->children;
    }
}