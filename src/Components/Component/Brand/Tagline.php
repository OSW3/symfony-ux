<?php 
namespace OSW3\UX\Components\Component\Brand;

use OSW3\UX\Components\Component\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/tagline.twig')]
final class Tagline extends Component
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

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Brand::NAME . "-tagline";
    }

    public function fetchTagline(): string
    {
        return trim($this->tagline ?? '');
    }
}