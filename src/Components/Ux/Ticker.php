<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeRelTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/ticker/base.twig')]
final class Ticker extends AbstractComponent
{
    public const NAME = "ticker";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeRelTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'speed')]
    public int $speed;
    
    #[ExposeInTemplate(name: 'delay')]
    public int $delay;
    
    #[ExposeInTemplate(name: 'direction')]
    public string $direction;
    
    #[ExposeInTemplate(name: 'loop')]
    public bool $loop;
    
    #[ExposeInTemplate(name: 'pauseHover')]
    public bool $pauseHover;
    
    #[ExposeInTemplate(name: 'items')]
    public array $items;

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

        $resolver->setDefault('speed', $options['speed']);
        $resolver->setAllowedTypes('speed', ['integer']);

        $resolver->setDefault('delay', $options['delay']);
        $resolver->setAllowedTypes('delay', ['integer']);

        $resolver->setDefault('direction', $options['direction']);
        $resolver->setAllowedValues('direction', ['ltr', 'rtl']);
        $resolver->setAllowedTypes('direction', ['string']);

        $resolver->setDefault('loop', $options['loop']);
        $resolver->setAllowedTypes('loop', ['bool']);

        $resolver->setDefault('pauseHover', $options['pause_hover']);
        $resolver->setAllowedTypes('pauseHover', ['bool']);

        $resolver->setDefault('items', []);
        $resolver->setAllowedTypes('items', ['array']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['tickers'];
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset['speed'] = $this->speed;
        $dataset['delay'] = $this->delay;
        $dataset['direction'] = $this->direction;
        $dataset['loop'] = $this->loop ? "true" : "false";
        $dataset['pauseHover'] = $this->pauseHover ? "true" : "false";

        $dataset = array_merge($dataset, $this->dataset);
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}