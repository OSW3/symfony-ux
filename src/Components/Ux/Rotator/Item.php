<?php 
namespace OSW3\UX\Components\Ux\Rotator;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;


#[AsTwigComponent(template: '@SymfonyUx/rotator/item.twig')]
final class Item extends AbstractComponent
{
    public const NAME = "rotator-item";
    
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'message')]
    public string $message;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefault('message', '');
        $resolver->setAllowedTypes('message', ['string']);

        return $resolver->resolve($data) + $data;
    }
    
}