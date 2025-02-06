<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Enum\Justify;
use OSW3\UX\Enum\Orientation;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/menu/base.twig')]
final class Menu extends Component {
    public const NAME = "menu";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $orientation;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $justify;

    #[ExposeInTemplate(name: 'schema')]
    public array $schema;

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

        $resolver->setDefault('schema', []);
        $resolver->setAllowedTypes('schema', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string {
        $classList = $this->classList();

        if (in_array($this->justify, Justify::toArray()) && $this->justify != Justify::START->value)
        {
            $classList[] = "{$this->getComponentClassname()}-{$this->justify}";
        }

        if ($this->orientation === Orientation::VERTICAL->value)
        {
            $classList[] = "{$this->getComponentClassname()}-{$this->orientation}";
        }

        return implode(" ", $classList);
    }
}