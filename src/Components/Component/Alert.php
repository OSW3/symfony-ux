<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
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
    
    #[ExposeInTemplate(name: 'type', getter: 'fetchType')]
    public string $is;
    
    #[ExposeInTemplate(name: 'message')]
    public string $message;
    
    #[ExposeInTemplate(name: 'dismissible')]
    public bool $dismissible;
    public int|string $delay;

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

        $resolver->setDefault('is', 'success');
        $resolver->setAllowedTypes('is', ['string']);

        $resolver->setRequired('message');
        $resolver->setAllowedTypes('message', ['string']);

        $resolver->setDefault('dismissible', $options['dismissible']);
        $resolver->setAllowedTypes('dismissible', ['bool']);

        $resolver->setDefault('delay', $options['delay']);
        $resolver->setAllowedTypes('delay', ['integer','string']);

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

    public function fetchType(): string 
    {
        return $this->is;
    }

}