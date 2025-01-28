<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Enum\Size;
use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/rating/base.twig')]
final class Rating extends Component
{
    public const NAME = "rating";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'suffix', getter: 'fetchSuffix')]
    private int $suffix;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $size;
    
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public int|string $ratingScale;
    
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public int|float|string $value;
    
    // #[ExposeInTemplate(getter: 'fetchLength')]
    public int|string $length;
    // public bool $half;
    
    #[ExposeInTemplate(getter: 'fetchTooltip')]
    public bool|string $tooltip;

    #[ExposeInTemplate(name: 'tooltipText')]
    public string $tooltipText;

    #[ExposeInTemplate(name: 'selected', getter: 'fetchSelected')]
    private int $selected;

    #[ExposeInTemplate(name: 'hasCounter')]
    public bool $counter;

    #[ExposeInTemplate(name: 'hasLegend')]
    public bool $legend;

    #[ExposeInTemplate(name: 'legends', getter: 'fetchLegends')]
    public array $legends;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('size', $options['size']);
        $resolver->setAllowedTypes('size', 'string');
        $resolver->setAllowedValues('size', Size::toArray());

        $resolver->setDefault('ratingScale', 5);
        $resolver->setAllowedTypes('ratingScale', ['integer', 'string']);

        $resolver->setDefault('value', 0);
        $resolver->setAllowedTypes('value', ['integer', 'float', 'string']);

        $resolver->setDefault('length', $options['length']);
        $resolver->setAllowedTypes('length', ['integer', 'string']);

        $resolver->setDefault('selected', 0);
        $resolver->setAllowedTypes('selected', ['integer']);

        $resolver->setDefault('tooltip', $options['tooltip']);
        $resolver->setAllowedTypes('tooltip', ['boolean', 'string']);

        // $resolver->setDefault('half', false);
        // $resolver->setAllowedTypes('half', ['boolean']);

        $resolver->setDefault('counter', $options['counter']);
        $resolver->setAllowedTypes('counter', ['boolean']);

        $resolver->setDefault('legend', $options['legend']);
        $resolver->setAllowedTypes('legend', ['boolean']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if (in_array($this->size, Size::toArray()) && $this->size != Size::NORMAL->value)
        {
            $classList[] = "{$this->getComponentClassname()}-{$this->size}";
        }

        return implode(" ", $classList);
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset['rating-scale'] = (int) $this->ratingScale;
        $dataset['value'] = (float) $this->value;

        $dataset = array_merge($dataset, $this->dataset);
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }

    public function fetchSuffix(): string 
    {
        return uniqid();
    }

    public function fetchSelected(): int
    {
        $ratio = $this->length / $this->ratingScale;
        return $this->value * $ratio;
    }

    public function fetchTooltip(): bool|string 
    {
        if (gettype($this->tooltip) === 'string') {
            $this->tooltipText = $this->tooltip;
        } else {
            $this->tooltipText = "%value%";
        }

        return $this->tooltip;
    }

    public function fetchLegends(): array 
    {
        $options  = $this->getConfig();

        return $options['legends'];
    }
}