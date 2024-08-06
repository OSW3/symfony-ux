<?php 
namespace OSW3\UX\Components\Brand;

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

    #[ExposeInTemplate(name: 'type')]
    public string $type;

    #[ExposeInTemplate(name: 'src')]
    public string $src;

    #[ExposeInTemplate(name: 'alt')]
    public string $alt;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefaults(['type' => "logo"]);
        $resolver->setAllowedTypes('type', ['string']);
        $resolver->setAllowedValues('type', ['logo', 'icon']);

        $resolver->setRequired('src');
        $resolver->setAllowedTypes('src', ['string']);
        
        $resolver->setRequired('alt');
        $resolver->setAllowedTypes('alt', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function getComponentClassname(): string 
    {
        return match($this->type) {
            'logo' => "{$this->prefix}brand-logo",
            'icon' => "{$this->prefix}brand-icon",
        };
    }

    // private function getConfig(): array 
    // {
    //     return $this->config['component']['brand'];
    // }
}