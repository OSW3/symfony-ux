<?php 
namespace OSW3\UX\Components\Ux\Modal;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/modal/inner.twig')]
final class Inner extends AbstractComponent
{
    public const NAME = "modal";
    
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