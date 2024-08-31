<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeRelTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Enum\SearchBox\Type;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/search-box/base.twig')]
final class SearchBox extends AbstractComponent
{
    public const NAME = "search-box";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeRelTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'type')]
    public string $type;

    #[ExposeInTemplate(name: 'shortcut')]
    public string|null|false $shortcut;


    // Form options

    #[ExposeInTemplate(name: 'request', getter: 'fetchRequest')]
    public array $request;

    #[ExposeInTemplate(name: 'method', getter: 'fetchMethod')]
    private string $method;

    #[ExposeInTemplate(name: 'action', getter: 'fetchAction')]
    private ?string $action;


    // Field options

    #[ExposeInTemplate(name: 'field', getter: 'fetchField')]
    public array $field;

    #[ExposeInTemplate(name: 'symbol', getter: 'fetchSymbol')]
    private ?array $symbol;

    #[ExposeInTemplate(name: 'param', getter: 'fetchParam')]
    private string $param;

    #[ExposeInTemplate(name: 'placeholder', getter: 'fetchPlaceholder')]
    private ?string $placeholder;


    // Submit options

    #[ExposeInTemplate(name: 'submit', getter: 'fetchSubmit')]
    private ?array $submit;

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
        $resolver->setAllowedValues('type', Type::toArray());
        $resolver->setAllowedTypes('type', ['string']);

        $resolver->setDefault('shortcut', $options['shortcut']);
        $resolver->setAllowedTypes('shortcut', ['string', 'null', 'boolean']);

        $resolver->setDefault('request', []);
        $resolver->setAllowedTypes('request', ['array']);

        $resolver->setDefault('field', []);
        $resolver->setAllowedTypes('field', ['array']);

        // $resolver->setDefault('symbol', []);
        // $resolver->setAllowedTypes('symbol', ['array']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['search_box'];
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
        $options  = $this->getConfig();

        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);

        if ($this->type != $options['type']) {
            $dataset['type'] = $this->type;
        }

        $dataset['shortcut'] = $this->shortcut ?? true;
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }

    public function fetchRequest(): array
    {
        return array_merge($this->getConfig()['request'], $this->request);
    }

    public function fetchField(): array 
    {
        $options = $this->getConfig();

        // Symbol

        $symbol = $options['field']['symbol'];


        if (isset($this->field['symbol']) && $this->field['symbol'] !== null) {
            $symbol = array_merge($symbol, $this->field['symbol']);
            $symbol['enable'] = true;
            $this->field['symbol'] = $symbol;
        }

        // Submit button

        $submit        = $options['field']['submit'];
        $submit_symbol = $options['field']['submit']['symbol'];
        $submit_label  = $options['field']['submit']['label'];

        if (isset($this->field['submit']) && $this->field['submit'] !== null) {
            $submit = array_merge($submit, $this->field['submit']);

            if (isset($submit['symbol']) && $submit['symbol'] !== null) {
                $submit['symbol'] = array_merge($submit_symbol, $submit['symbol']);
                $submit['symbol']['enable'] = true;
            }

            if (isset($submit['label']) && $submit['label'] !== null) {
                $submit['label'] = array_merge($submit_label, $submit['label']);
            }
            
            $this->field['submit'] = $submit;
        }

        $this->field['submit']['hidden'] = !!($this->field['submit']['hidden'] ?? false);

        return array_merge($options['field'], $this->field);
    }

    public function fetchMethod(): string 
    {
        return $this->fetchRequest()['method'];
    }

    public function fetchAction(): ?string
    {
        $request = $this->fetchRequest();
        $action = null;

        if (empty($action) && $request['route'] != null) {
            $action = $this->urlGenerator->generate($request['route']);
        }

        if (empty($action)) {
            $action = $request['url'];
        }

        return $action;
    }

    public function fetchSymbol(): ?array 
    {
        return $this->fetchField()['symbol'];
    }

    public function fetchSubmit(): ?array 
    {
        return $this->fetchField()['submit'];
    }

    public function fetchParam(): string 
    {
        return $this->fetchRequest()['param'];
    }

    public function fetchPlaceholder(): string 
    {
        return $this->fetchField()['placeholder'];
    }
}