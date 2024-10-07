<?php 
namespace OSW3\UX\Components\Ux\Menu;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/menu/item.twig')]
final class Item extends AbstractComponent
{
    use DoNotExposeTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'label')]
    public string $label;
    
    #[ExposeInTemplate(name: 'icon')]
    public string $icon;
    
    #[ExposeInTemplate(name: 'url')]
    public string $url;
    
    #[ExposeInTemplate(name: 'target')]
    public string $target;
    
    #[ExposeInTemplate(name: 'isActive')]
    public bool $isActive;
    
    #[ExposeInTemplate(name: 'isDisabled')]
    public bool $isDisabled;
    
    #[ExposeInTemplate(name: 'children')]
    public array $children;

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

        $resolver->setDefault('label', "");
        $resolver->setAllowedTypes('label', ['string']);

        $resolver->setDefault('icon', "");
        $resolver->setAllowedTypes('icon', ['string']);

        $resolver->setDefault('url', "");
        $resolver->setAllowedTypes('url', ['string']);

        $resolver->setDefault('target', "");
        $resolver->setAllowedTypes('target', ['string']);

        $resolver->setDefault('isActive', false);
        $resolver->setAllowedTypes('isActive', ['boolean']);

        $resolver->setDefault('isDisabled', false);
        $resolver->setAllowedTypes('isDisabled', ['boolean']);

        $resolver->setDefault('children', []);
        $resolver->setAllowedTypes('children', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function getComponentClassname(): string 
    {
        return "{$this->prefix}menu-item";
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if (!empty($this->children))
        {
            $classList[] = "with-submenu";
        }

        return implode(" ", $classList);
    }
}