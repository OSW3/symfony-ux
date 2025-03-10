<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeStyleTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/template/base.twig')]
final Class Template extends Component
{
    public const NAME = "template";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeStyleTrait;
    
    public string $source;

    #[ExposeInTemplate(name: 'option')]
    public array $options;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public array $order;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            // ->datasetResolver($resolver)
        ;

        $resolver->isRequired('source');
        $resolver->setAllowedTypes('source', ['string']);

        $resolver->setDefault('options', []);
        $resolver->setAllowedTypes('options', ['array']);

        $resolver->setDefault('order', []);
        $resolver->setAllowedTypes('order', ['array']);

        return $resolver->resolve($data) + $data;
    }


    public function fetchStyle(): string {
        $options = [];
        $style = '';

        foreach ($this->order as $property => $value) {
            $options["--{$this->prefix}menu-section-order-{$property}"] = $value;
        }
        
        foreach ($options as $property => $value) {
            $style.= "{$property}:{$value};";
        }

        return $style;
    }
}