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

#[AsTwigComponent(template: '@UxComponents/search/base.twig')]
final class SearchOld extends AbstractComponent
{
    public const NAME = "search";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeRelTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'type')]
    public string $type;



    
    #[ExposeInTemplate(name: 'shortcut', getter: 'doNotExpose')]
    public bool $shortcut;
    
    // #[ExposeInTemplate(name: 'modal')]
    // public bool $modal;

    #[ExposeInTemplate(name: 'method')]
    public string $method;

    #[ExposeInTemplate(name: 'param')]
    public string $param;

    #[ExposeInTemplate(name: 'placeholder')]
    public string $placeholder;

    #[ExposeInTemplate(name: 'autocomplete')]
    public bool $autocomplete;

    #[ExposeInTemplate(name: 'label')]
    public string $label;

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

        $resolver->setDefault('type', $options['type']);
        $resolver->setAllowedValues('type', ['basic', 'list', 'modal']);
        $resolver->setAllowedTypes('type', ['string']);






        $resolver->setDefault('shortcut', $options['shortcut']);
        $resolver->setAllowedTypes('shortcut', ['boolean']);

        // $resolver->setDefault('modal', $options['modal']);
        // $resolver->setAllowedTypes('modal', ['boolean']);

        $resolver->setDefault('method', $options['method']);
        $resolver->setAllowedValues('method', ['get', 'post']);
        $resolver->setAllowedTypes('method', ['string']);

        $resolver->setDefault('param', $options['param']);
        $resolver->setAllowedTypes('param', ['string']);

        $resolver->setDefault('placeholder', $options['placeholder']);
        $resolver->setAllowedTypes('placeholder', ['string']);

        $resolver->setDefault('autocomplete', $options['autocomplete']);
        $resolver->setAllowedTypes('autocomplete', ['bool']);

        $resolver->setDefault('label', $options['label']);
        $resolver->setAllowedTypes('label', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchId()
    {
        if (empty($this->id)) {
            $this->id = $this->getComponentClassname()."-".uniqid();
        }
        return $this->id;
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);
        $dataset['shortcut'] = $this->shortcut ? 'true' : 'false';

        if ($this->type != 'basic') {
            $dataset['type'] = $this->type;
        }
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}