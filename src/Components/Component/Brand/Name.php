<?php 
namespace OSW3\UX\Components\Component\Brand;

use OSW3\UX\Components\Component\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/name.twig')]
final class Name extends Component
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'hidden')]
    public bool $hidden;

    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public string $name;
    
    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefault('hidden', false);
        $resolver->setAllowedTypes('hidden', ['bool']);

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
        
        // if ($this->name !== false) {
        //     $name = !empty($this->name) ? trim($this->name) : null;
        //     $name = $name === null && !empty($options['name']) ? trim($options['name']) : null;
        // }

        return $this->name;
    }
}