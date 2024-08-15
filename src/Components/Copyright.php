<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/copyright/base.twig')]
final class Copyright extends AbstractComponent
{
    public const NAME = "copyright";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    

    #[ExposeInTemplate(name: 'symbol', getter: 'doNotExpose')]
    public string $symbol;
    
    #[ExposeInTemplate(name: 'dates_separator', getter: 'doNotExpose')]
    public string $datesSeparator;
    
    #[ExposeInTemplate(name: 'separator', getter: 'doNotExpose')]
    public string $separator;
    
    #[ExposeInTemplate(name: 'since', getter: 'doNotExpose')]
    public string|int $since;
    
    #[ExposeInTemplate(name: 'company', getter: 'doNotExpose')]
    public ?string $company;

    #[ExposeInTemplate(name: 'copyright', getter: 'fetchCopyright')]
    private string $copyright;



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

        $resolver->setDefault('symbol', $options['symbol']);
        $resolver->setAllowedTypes('symbol', ['string']);

        $resolver->setDefault('datesSeparator', $options['dates_separator']);
        $resolver->setAllowedTypes('datesSeparator', ['string']);

        $resolver->setDefault('separator', $options['separator']);
        $resolver->setAllowedTypes('separator', ['string']);

        $resolver->setDefault('company', $options['company']);
        $resolver->setAllowedTypes('company', ['null', 'string']);

        $resolver->setDefault('since', $options['since']);
        $resolver->setAllowedTypes('since', ['string','integer']);

        return $resolver->resolve($data) + $data;
    }



    public function fetchCopyright(): string
    {
        $current = date("Y");

        $copyright = "";
        $copyright.= "{$this->symbol} ";

        if ($this->since < $current)
        {
            $copyright.= "{$this->since}";
            $copyright.= "{$this->datesSeparator}";
        }

        $copyright.= "{$current}";

        if (!empty($this->company))
        {
            $copyright.= "{$this->separator}";
            $copyright.= "{$this->company}";
        }

        return $copyright;
    }
}