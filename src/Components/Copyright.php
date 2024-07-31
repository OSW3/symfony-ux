<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Enum\ComponentTrait;
use OSW3\UX\Service\AttributeClassService;
use OSW3\UX\Service\AttributeDataService;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/copyright/base.twig')]
final class Copyright 
{
    use ComponentTrait;

    /**
     * Component name
     * 
     * @var string
     */
    const NAME = "copyright";

//     /**
//      * The ID
//      * --
//      * @example <twig:Copyright id="my-custom-id" />
//      * @isExposed true
//      * @isRequired false
//      * @default null
//      * @var string
//      */
//     #[ExposeInTemplate(name: 'id')]
//     public string $id;

//     /**
//      * The custom class
//      * --
//      * @example <twig:Copyright class="my-custom-class" />
//      * @isExposed true
//      * @isRequired false
//      * @default null
//      * @var string
//      */
//     #[ExposeInTemplate(name: 'class', getter: 'fetchClass')]
//     public string $class;
    
//     /**
//      * Dataset Attributes
//      * --
//      * @example <twig:Copyright :dataset="{property: 'value'}" />
//      * @isExposed true
//      * @isRequired false
//      * @default null
//      * @var array
//      */
//     #[ExposeInTemplate(name: 'dataset', getter: 'fetchDataset')]
//     public array $dataset;
    
//     /**
//      * Copyright Symbol
//      * --
//      * @example <twig:Copyright symbol="&copy;" />
//      * @isExposed false
//      * @isRequired false
//      * @default "&copy;"
//      * @var string
//      */
//     #[ExposeInTemplate(name: 'symbol', getter: 'doNotExpose')]
//     public string $symbol;
    
//     /**
//      * Dates separator
//      * --
//      * @example <twig:Copyright separator="-" />
//      * @isExposed false
//      * @isRequired false
//      * @default "-"
//      * @var string
//      */
//     #[ExposeInTemplate(name: 'separator', getter: 'doNotExpose')]
//     public string $separator;
    
//     /**
//      * Copyright Year since
//      * --
//      * @example <twig:Copyright since="2009" />
//      * @isExposed false
//      * @isRequired false
//      * @default "&copy;"
//      * @var string
//      */
//     #[ExposeInTemplate(name: 'since', getter: 'doNotExpose')]
//     public string|int $since;
    
//     /**
//      * Company Name
//      * --
//      * @example <twig:Copyright company="My Company" />
//      * @isExposed false
//      * @isRequired false
//      * @default ""
//      * @var string
//      */
//     #[ExposeInTemplate(name: 'company', getter: 'doNotExpose')]
//     public string $company;

//    #[ExposeInTemplate(name: 'copyright', getter: 'fetchCopyright')]
//    private string $copyright;

    public function __construct(
        protected AttributeClassService $classlist,
        protected AttributeDataService $attributeDataService
    ){}

    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        // $resolver->setDefaults(['id' => ""]);
        // $resolver->setAllowedTypes('id', ['string']);

        // $resolver->setDefaults(['class' => ""]);
        // $resolver->setAllowedTypes('class', ['string']);

        // $resolver->setDefaults(['dataset' => []]);
        // $resolver->setAllowedTypes('dataset', ['array']);

        // $resolver->setDefaults(['symbol' => "&copy;"]);
        // $resolver->setAllowedTypes('symbol', ['string']);

        // $resolver->setDefaults(['separator' => "-"]);
        // $resolver->setAllowedTypes('separator', ['string']);

        // $resolver->setDefaults(['company' => ""]);
        // $resolver->setAllowedTypes('company', ['string']);

        // $resolver->setDefaults(['since' => ""]);
        // $resolver->setAllowedTypes('since', ['string','integer']);

        return $resolver->resolve($data) + $data;
    }

    // public function fetchClass(): string
    // {
    //     $this->classlist->reset();
    //     $this->classlist->add(self::NAME);

    //     // Custom class
    //     $this->classlist->add($this->class);

    //     return $this->classlist->toString();
    // }

    // public function fetchDataset(): array
    // {
    //     $this->attributeDataService->reset();
    //     // $this->attributeDataService->add(['component' => self::NAME]);
    //     $this->attributeDataService->add($this->dataset);

    //     return $this->attributeDataService->getAll();
    // }

    // public function fetchCopyright(): string
    // {
    //     $current = date("Y");

    //     $copyright = "";
    //     $copyright.= $this->symbol;

    //     if ($this->since < $current)
    //     {
    //         $copyright.= " {$this->since}";
    //         $copyright.= " {$this->separator}";
    //     }

    //     $copyright.= " {$current}";
    //     $copyright.= " {$this->company}";

    //     return $copyright;
    // }
}