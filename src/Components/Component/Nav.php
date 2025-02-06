<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Enum\Justify;
use OSW3\UX\Enum\Orientation;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeAriaTrait;
use OSW3\UX\Trait\AttributeStyleTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/nav/base.twig')]
final class Nav extends Component {
    public const NAME = "nav";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    use AttributeAriaTrait;
    use AttributeStyleTrait;

    #[ExposeInTemplate(name: 'orientation')]
    public string $orientation;

    #[ExposeInTemplate(name: 'justify')]//, getter: 'doNotExpose')]
    public string $justify;

    #[ExposeInTemplate(name: 'label')]
    public string|null $label;

    #[ExposeInTemplate(name: 'items')]
    public array $items;

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
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('orientation', Orientation::HORIZONTAL->value);
        $resolver->setAllowedTypes('orientation', ['string']);
        $resolver->setAllowedValues('orientation', Orientation::toArray());

        $resolver->setDefault('justify', Justify::START->value);
        $resolver->setAllowedTypes('justify', ['string']);
        $resolver->setAllowedValues('justify', Justify::toArray());

        $resolver->setDefault('label', null);
        $resolver->setAllowedTypes('label', ['string', 'null']);

        $resolver->setDefault('items', []);
        $resolver->setAllowedTypes('items', ['array']);

        $resolver->setDefault('order', []);
        $resolver->setAllowedTypes('order', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string {
        $classList = $this->classList();

        if (
            in_array($this->justify, Justify::toArray()) && 
            $this->justify != Justify::START->value
        ){
            $classList[] = "{$this->getComponentClassname()}-{$this->justify}";
        }

        if ($this->orientation === Orientation::VERTICAL->value)
        {
            $classList[] = "{$this->getComponentClassname()}-{$this->orientation}";
        }

        return implode(" ", $classList);
    }

    public function fetchAria(): array
    {
        $aria = [];
        // $aria = array_merge($aria, $this->aria);

        $label = trim($this->label);
        if (!empty($label)) { $aria['label'] = $label; }
        
        foreach ($aria as $property => $value)
        {
            $aria["aria-{$property}"] = $value;
            unset($aria[$property]);
        }

        return $aria;
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