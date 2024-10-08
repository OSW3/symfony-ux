<?php 
namespace OSW3\UX\Components\Ux\SearchBox;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/search-box/input.twig')]
final class Input extends AbstractComponent
{
    public const NAME = "search-box";
    
    // use DoNotExposeTrait;
    // use AttributeClassTrait;
    // use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'param')]
    public string $param;

    #[ExposeInTemplate(name: 'placeholder')]
    public string $placeholder;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
        //     ->idResolver($resolver)
            // ->classResolver($resolver)
            // ->datasetResolver($resolver)
        ;

        $resolver->setDefault('param', $options['request']['param']);
        $resolver->setAllowedTypes('param', ['string']);

        $resolver->setDefault('placeholder', $options['field']['placeholder']);
        $resolver->setAllowedTypes('placeholder', ['string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['search_box'];
    }

    // public function fetchClass(): string
    // {
    //     return "{$this->prefix}form-control";
    // }

    // public function fetchDataset(): array
    // {
    //     $dataset = [];
    //     $dataset = array_merge($dataset, $this->dataset);
        
    //     foreach ($dataset as $property => $value)
    //     {
    //         $dataset["data-{$property}"] = $value;
    //         unset($dataset[$property]);
    //     }

    //     return $dataset;
    // }
}