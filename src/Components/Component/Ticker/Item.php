<?php 
namespace OSW3\UX\Components\Component\Ticker;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/ticker/item.twig')]
final class Item extends Component
{
    public const NAME = "ticker-item";
    
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'message')]
    public string $message;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefault('message', '');
        $resolver->setAllowedTypes('message', ['string']);

        return $resolver->resolve($data) + $data;
    }
}
