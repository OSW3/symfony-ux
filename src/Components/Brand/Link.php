<?php 
namespace OSW3\UX\Components\Brand;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/brand/link.twig')]
final class Link extends AbstractComponent
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'name')]
    public ?string $name;

    #[ExposeInTemplate(name: 'tagline')]
    public ?string $tagline;

    #[ExposeInTemplate(name: 'link')]
    public string $link;
    
    #[ExposeInTemplate(name: 'logo')]
    public ?string $logo;
    
    #[ExposeInTemplate(name: 'icon')]
    public ?string $icon;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        // $resolver->setRequired('name');
        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string']);

        $resolver->setDefault('tagline', "");
        $resolver->setAllowedTypes('tagline', ['null', 'string']);

        $resolver->setRequired('link');
        $resolver->setAllowedTypes('link', ['null', 'string']);

        $resolver->setDefault('logo', $options['logo']);
        $resolver->setAllowedTypes('logo', ['null', 'string']);

        $resolver->setDefault('icon', $options['icon']);
        $resolver->setAllowedTypes('icon', ['null', 'string']);

        return $resolver->resolve($data) + $data;
    }

    private function getConfig(): array 
    {
        return $this->config['components']['brand'];
    }

    public function getComponentClassname(): string 
    {
        return "{$this->prefix}brand-link";
    }
}