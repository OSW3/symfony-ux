<?php 
namespace OSW3\UX\Components\Ux\Brand;

use OSW3\UX\Components\Ux\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/link.twig')]
final class Link extends AbstractComponent
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public ?string $name;

    #[ExposeInTemplate(name: 'tagline')]
    public ?string $tagline;

    #[ExposeInTemplate(name: 'link')]
    public string $link;

    #[ExposeInTemplate(name: 'logo')]
    public array $logo;

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
        $resolver->setAllowedTypes('logo', ['array']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components'][Brand::NAME];
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Brand::NAME . "-link";
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
}