<?php 
namespace OSW3\UX\Components\SearchOld;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/search/input.twig')]
final class Input extends AbstractComponent
{
    public const NAME = "search";
    
    // use DoNotExposeTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'param')]
    public string $param;

    #[ExposeInTemplate(name: 'placeholder')]
    public string $placeholder;

    #[ExposeInTemplate(name: 'autocomplete')]
    public bool $autocomplete;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
        //     ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('param', $options['param']);
        $resolver->setAllowedTypes('param', ['string']);

        $resolver->setDefault('placeholder', $options['placeholder']);
        $resolver->setAllowedTypes('placeholder', ['string']);

        $resolver->setDefault('autocomplete', $options['autocomplete']);
        $resolver->setAllowedTypes('autocomplete', ['bool']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        return "{$this->prefix}form-control";
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);
        $dataset['autocomplete'] = $this->autocomplete ? 'true' : 'false';
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}