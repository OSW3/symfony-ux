<?php 
namespace OSW3\UX\Components\Menu;

use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/menu/items.twig')]
final class Items extends AbstractComponent
{
    use DoNotExposeTrait;
    use AttributeClassTrait;



    #[ExposeInTemplate(name: 'level')]
    public int $level;
    
    #[ExposeInTemplate(name: 'items')]
    public array $items;



    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->classResolver($resolver)
        ;

        $resolver->setDefault('level', 1);
        $resolver->setAllowedTypes('level', ['integer']);

        $resolver->setDefault('items', []);
        $resolver->setAllowedTypes('items', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function getComponentClassname(): string 
    {
        return "{$this->prefix}menu-items";
    }
}