<?php 
namespace OSW3\UX\Components\Brand;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/brand/name.twig')]
final class Name extends AbstractComponent
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public string $name;
    
    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setRequired('name');
        $resolver->setAllowedTypes('name', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function getComponentClassname(): string 
    {
        return "{$this->prefix}brand-name";
    }

    public function fetchName(): string
    {
        return trim($this->name);
    }
}