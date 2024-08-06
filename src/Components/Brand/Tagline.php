<?php 
namespace OSW3\UX\Components\Brand;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/brand/tagline.twig')]
final class Tagline extends AbstractComponent
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'tagline', getter: 'fetchTagline')]
    public string $tagline;
    
    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setRequired('tagline');
        $resolver->setAllowedTypes('tagline', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function getComponentClassname(): string 
    {
        return "{$this->prefix}brand-tagline";
    }

    public function fetchTagline(): string
    {
        return trim($this->tagline);
    }
}