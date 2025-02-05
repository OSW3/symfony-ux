<?php 
namespace OSW3\UX\Components\Component\Nav;

use OSW3\UX\Components\Component;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/nav/items.twig')]
final class Items extends Component {
    public const NAME = "nav-items";

    use DoNotExposeTrait;
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'items')]
    public array $items;

    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->classResolver($resolver)
        ;

        $resolver->setDefault('items', []);
        $resolver->setAllowedTypes('items', ['array']);

        return $resolver->resolve($data) + $data;
    }
}