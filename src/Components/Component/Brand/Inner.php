<?php 
namespace OSW3\UX\Components\Component\Brand;

use OSW3\UX\Components\Component\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/inner.twig')]
final class Inner extends Component
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public ?string $name;

    #[ExposeInTemplate(name: 'tagline')]
    public ?string $tagline;

    #[ExposeInTemplate(name: 'logo')]
    public array|string $logo;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string']);

        $resolver->setDefault('tagline', $options['tagline']);
        $resolver->setAllowedTypes('tagline', ['null', 'string']);

        $resolver->setDefault('logo', $options['logo']);
        $resolver->setAllowedTypes('logo', ['array','string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components'][Brand::NAME];
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Brand::NAME . "-inner";
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