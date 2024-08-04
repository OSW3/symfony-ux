<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Enum\Justify;
use OSW3\UX\Enum\Orientation;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/menu/base.twig')]
final class Menu extends AbstractComponent
{
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;



    #[ExposeInTemplate(name: 'justify', getter: 'doNotExpose')]
    public string $justify;

    #[ExposeInTemplate(name: 'orientation')]
    public string $orientation;

    #[ExposeInTemplate(name: 'label', getter: 'fetchLabel')]
    public string $label;

    #[ExposeInTemplate(name: 'items')]
    public array $items;



    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('justify', Justify::START->value);
        $resolver->setAllowedTypes('justify', ['string']);
        $resolver->setAllowedValues('justify', Justify::toArray());

        $resolver->setDefault('orientation', Orientation::HORIZONTAL->value);
        $resolver->setAllowedTypes('orientation', ['string']);
        $resolver->setAllowedValues('orientation', Orientation::toArray());

        $resolver->setDefault('label', "");
        $resolver->setAllowedTypes('label', ['string']);

        $resolver->setDefault('items', []);
        $resolver->setAllowedTypes('items', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function getComponentClassname(): string 
    {
        return "{$this->prefix}menu";
    }



    public function fetchLabel(): string 
    {
        return trim($this->label);
    }

    public function fetchClass(): string
    {
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