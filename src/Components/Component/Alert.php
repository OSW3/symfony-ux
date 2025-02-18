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

    /**
     * Delay in seconds before alerts are automatically dismissed.
     * 
     * @var int|string|null
     */
    #[ExposeInTemplate(name: 'delay')]
    public int|string|null $delay;
    
    /**
     * Indicates whether the alert can be dismissed by the user.
     *
     * @var bool
     */
    #[ExposeInTemplate(name: 'dismissible')]
    public bool $dismissible;

    /**
     * Icon associated with the alert.
     * 
     * @var string|null
     */
    #[ExposeInTemplate(name: 'icon')]
    public string|null $icon;
    
    /**
     * Type of the alert.
     * 
     * @var string
     */
    #[ExposeInTemplate(name: 'type', getter: 'fetchType')]
    public string|null $is;

    /**
     * Message displayed in the alert.
     * 
     * @var string
     */
    #[ExposeInTemplate(name: 'message')]
    public string $message;

    /**
     * Size of the alert (small, normal, medium, large).
     * 
     * @var string
     */
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $size;

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

        $resolver->setDefault('delay', $options['delay']);
        $resolver->setAllowedTypes('delay', ['integer','string', 'null']);

        $resolver->setDefault('dismissible', $options['dismissible']);
        $resolver->setAllowedTypes('dismissible', ['bool']);

        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string', 'null']);

        $resolver->setDefaults(['is' => null]);
        $resolver->setAllowedTypes('is', ['string','null']);
        $resolver->setAllowedValues('is', array_merge([null], Palette::toArray()));

        $resolver->setRequired('message');
        $resolver->setAllowedTypes('message', ['string']);

        $resolver->setDefaults(['size' => Size::NORMAL->value]);
        $resolver->setAllowedTypes('size', 'string');
        $resolver->setAllowedValues('size', Size::toArray());

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['alerts'];
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if ($this->fetchType() !== null) {
            $classList[] = "{$this->getComponentClassname()}-{$this->fetchType()}";
        }

        if (in_array($this->size, Size::toArray()) && $this->size != Size::NORMAL->value) {
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

            if ($this->delay) {
                $dataset['delay'] = $this->delay;
            }
        }
        
        foreach ($dataset as $property => $value) {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }

    public function fetchType(): string|null {
        return $this->is;
    }
}