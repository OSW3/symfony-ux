<?php 
namespace OSW3\UX\Components\Ux\Brand;

use OSW3\UX\Components\Ux\Brand;
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

    protected function getConfig(): array 
    {
        return $this->config['components'][Brand::NAME];
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Brand::NAME . "-name";
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