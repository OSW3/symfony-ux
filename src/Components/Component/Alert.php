<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Enum\Size;
use OSW3\UX\Enum\Palette;
use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/alert/base.twig')]
class Alert extends Component
{
    public const NAME = "alert";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'icon')]
    public string|null $icon;

    #[ExposeInTemplate(name: 'message')]
    public string $message;
    
    #[ExposeInTemplate(name: 'type', getter: 'fetchType')]
    public string $is;

    // #[ExposeInTemplate(getter: 'doNotExpose')]
    // public string $is;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $size;
    
    #[ExposeInTemplate(name: 'dismissible')]
    public bool $dismissible;

    #[ExposeInTemplate(name: 'duration')]
    public int|string|null $duration;

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

        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string', 'null']);

        $resolver->setRequired('message');
        $resolver->setAllowedTypes('message', ['string']);

        $resolver->setDefaults(['is' => Palette::SUCCESS->value]);
        $resolver->setAllowedTypes('is', ['string']);
        $resolver->setAllowedValues('is', Palette::toArray());

        $resolver->setDefaults(['size' => Size::NORMAL->value]);
        $resolver->setAllowedTypes('size', 'string');
        $resolver->setAllowedValues('size', Size::toArray());

        $resolver->setDefault('dismissible', $options['dismissible']);
        $resolver->setAllowedTypes('dismissible', ['bool']);

        $resolver->setDefault('duration', $options['duration']);
        $resolver->setAllowedTypes('duration', ['integer','string', 'null']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['alerts'];
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        $classList[] = "{$this->getComponentClassname()}-{$this->fetchType()}";

        if (in_array($this->size, Size::toArray()) && $this->size != Size::NORMAL->value)
        {
            $classList[] = "{$this->getComponentClassname()}-{$this->size}";
        }

        return implode(" ", $classList);
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);

        if ($this->dismissible) {
            $dataset['dismissible'] = true;

            if ($this->duration) {
                $dataset['duration'] = $this->duration;
            }
        }
        
        foreach ($dataset as $property => $value) {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }

    public function fetchType(): string 
    {
        return $this->is;
    }
}