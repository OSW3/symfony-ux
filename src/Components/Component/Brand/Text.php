<?php 
namespace OSW3\UX\Components\Component\Brand;

use OSW3\UX\Components\Component\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/text.twig')]
final class Text extends Component
{
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public string|null|false $name;
    
    #[ExposeInTemplate(name: 'tagline', getter: 'fetchTagline')]
    public string|null|false $tagline;

    #[PreMount]
    public function preMount(array $data): array {

        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string', 'bool']);

        $resolver->setDefault('tagline', $options['tagline']);
        $resolver->setAllowedTypes('tagline', ['null', 'string', 'bool']);


        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array {
        return $this->config['components'][Brand::NAME];
    }

    protected function getComponentClassname(): string {
        return $this->prefix . Brand::NAME . "-text";
    }

    public function fetchName(): ?string {
        $name = $this->name !== false ? trim($this->name ?? '') : null;
        $name = !empty($name) ? trim($name ?? '') : null;
        return $name;
    }

    public function fetchTagline(): ?string {
        $tagline = $this->tagline !== false ? trim($this->tagline ?? '') : null;
        $tagline = !empty($tagline) ? trim($tagline ?? '') : null;
        return $tagline;
    }
}