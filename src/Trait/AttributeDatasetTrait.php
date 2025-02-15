<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeDatasetTrait
{
    #[ExposeInTemplate(name: 'dataset', getter: 'fetchDataset')]
    public array $dataset = [];

    private function datasetResolver(&$resolver): static
    {
        $resolver->setDefault('dataset', []);
        $resolver->setAllowedTypes('dataset', ['array']);

        return $this;
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}