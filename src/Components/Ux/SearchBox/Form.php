<?php 
namespace OSW3\UX\Components\Ux\SearchBox;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/search-box/form.twig')]
final class Form extends AbstractComponent
{
    public const NAME = "search-box";
    
    use DoNotExposeTrait;
    use AttributeDatasetTrait;

    // Form

    public string $id;

    #[ExposeInTemplate(name: 'isMain', getter: 'doNotExpose')]
    public bool $isMain = false;

    #[ExposeInTemplate(name: 'name',getter: 'fetchName')]
    private string $name;

    #[ExposeInTemplate(name: 'method')]
    public string $method;

    #[ExposeInTemplate(name: 'action', getter: 'fetchAction')]
    public ?string $action;


    // Symbol 
    
    #[ExposeInTemplate(name: 'symbol', getter: 'fetchSymbol')]
    public ?array $symbol;
    

    // Input 
    
    #[ExposeInTemplate(name: 'param')]
    public string $param;
    
    #[ExposeInTemplate(name: 'placeholder')]
    public string $placeholder;


    // Submit 
    
    #[ExposeInTemplate(name: 'button', getter: 'fetchButton')]
    public ?array $button;


    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
        //     ->idResolver($resolver)
        //     ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        // Form

        $resolver->setDefault('isMain', false);
        $resolver->setAllowedTypes('isMain', ['boolean']);

        $resolver->setDefault('name', null);
        $resolver->setAllowedTypes('name', ['null','string']);

        $resolver->setDefault('method', $options['request']['method']);
        $resolver->setAllowedValues('method', ['get', 'post']);
        $resolver->setAllowedTypes('method', ['string']);

        $resolver->setDefault('action', null);
        $resolver->setAllowedTypes('action', ['null','string']);


        // Symbol 

        $resolver->setDefault('symbol', []);
        $resolver->setAllowedTypes('symbol', ['null','array']);
    

        // Input 
        
        $resolver->setDefault('param', $options['request']['param']);
        $resolver->setAllowedTypes('param', ['string']);

        $resolver->setDefault('placeholder', $options['field']['placeholder']);
        $resolver->setAllowedTypes('placeholder', ['string']);
        
        // Submit 

        $resolver->setDefault('button', []);
        $resolver->setAllowedTypes('button', ['null','array']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['search_box'];
    }

    public function fetchName(): string 
    {
        $level = $this->isMain ? "primary" : "secondary";
        return "{$this->id}[{$level}]";
    }

    public function fetchAction()
    {
        $options  = $this->getConfig();
        $action = $this->action;

        if (empty($action) && $options['request']['route'] != null) {
            $action = $this->urlGenerator->generate($options['request']['route']);
        }

        if (empty($action)) {
            $action = $options['request']['url'];
        }

        return $action;
    }

    public function fetchSymbol()
    {
        $options = $this->getConfig();
        $symbol  = $this->symbol;

        if ($symbol === null) {
            $symbol = array_merge($options['field']['symbol'], [
                'enable' => false
            ]);
        }

        return $symbol;
    }

    public function fetchButton()
    {
        $options = $this->getConfig();
        $button = $this->button;

        if ($button === null) {
            $button = $options['field']['submit'];
        }

        return $button;
    }

    // public function fetchDataset(): array
    // {
    //     $dataset = [];
    //     $dataset = array_merge($dataset, $this->dataset);
    //     $dataset['name'] = $this->fetchName();
        
    //     foreach ($dataset as $property => $value)
    //     {
    //         $dataset["data-{$property}"] = $value;
    //         unset($dataset[$property]);
    //     }

    //     return $dataset;
    // }
}