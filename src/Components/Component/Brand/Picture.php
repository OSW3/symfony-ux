<?php 
namespace OSW3\UX\Components\Component\Brand;

use OSW3\UX\Components\Component\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/picture.twig')]
final class Picture extends Component
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'figures')]
    public array|string $figures;
    
    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public string|null|false $name;

    #[PreMount]
    public function preMount(array $data): array 
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefault('figures', $options['figures']);
        $resolver->setAllowedTypes('figures', ['array','string']);

        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string', 'bool']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array {
        return $this->config['components'][Brand::NAME];
    }

    protected function getComponentClassname(): string {
        return $this->prefix . Brand::NAME . "-figures";
    }

    public function fetchName(): ?string {
        $name = $this->name !== false ? trim($this->name ?? '') : null;
        $name = !empty($name) ? trim($name ?? '') : null;
        return $name;
    }
}