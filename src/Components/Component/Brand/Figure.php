<?php 
namespace OSW3\UX\Components\Component\Brand;

use OSW3\UX\Components\Component\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/figure.twig')]
final class Figure extends Component
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'breakpoint')]
    public string $breakpoint;

    #[ExposeInTemplate(name: 'src')]
    public string $src;

    #[ExposeInTemplate(name: 'alt')]
    public ?string $alt;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefaults(['breakpoint' => "default"]);
        $resolver->setAllowedTypes('breakpoint', ['string']);

        $resolver->setRequired('src');
        $resolver->setAllowedTypes('src', ['string']);
        
        $resolver->setDefault('alt', null);
        $resolver->setAllowedTypes('alt', ['null','string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Brand::NAME . "-figure";
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();
        $classList[] = "{$this->getComponentClassname()}-{$this->breakpoint}";

        return implode(" ", $classList);
    }
}