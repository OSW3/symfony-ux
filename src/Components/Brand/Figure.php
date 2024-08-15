<?php 
namespace OSW3\UX\Components\Brand;

use OSW3\UX\Components\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/brand/figure.twig')]
final class Figure extends AbstractComponent
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'breakpoint')]
    public string $breakpoint;

    #[ExposeInTemplate(name: 'src')]
    public string $src;

    #[ExposeInTemplate(name: 'alt')]
    public string $alt;

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
        
        $resolver->setRequired('alt');
        $resolver->setAllowedTypes('alt', ['string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Brand::NAME . "-logo";
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();
        $classList[] = "{$this->getComponentClassname()}-{$this->breakpoint}";

        return implode(" ", $classList);
    }
}