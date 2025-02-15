<?php 
namespace OSW3\UX\Components\Component\Offcanvas;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/offcanvas/inner.twig')]
final class Inner extends Component
{
    public const NAME = "offcanvas";
    
    use DoNotExposeTrait;
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'content')]
    public string $content;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefault('content', "");
        $resolver->setAllowedTypes('content', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classList = [];
        $classList[] = "{$this->getComponentClassname()}-inner";

        return implode(" ", $classList);
    }
}