<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\ContainerInterface;

#[AsTwigComponent(template: '@UxComponents/copyright/base.twig')]
final class Copyright
{
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

    private array $options;


    public function __construct(
        #[Autowire(service: 'service_container')] private ContainerInterface $container,
    )
    {
        $params = $container->getParameter(Configuration::NAME);
        $this->options = $params['component']['copyright'];
    }

    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('symbol', $this->options['symbol']);
        $resolver->setAllowedTypes('symbol', ['string']);

        $resolver->setDefault('datesSeparator', $this->options['dates_separator']);
        $resolver->setAllowedTypes('datesSeparator', ['string']);

        $resolver->setDefault('separator', $this->options['separator']);
        $resolver->setAllowedTypes('separator', ['string']);

        $resolver->setDefault('company', $this->options['company']);
        $resolver->setAllowedTypes('company', ['null', 'string']);

        $resolver->setDefault('since', $this->options['since']);
        $resolver->setAllowedTypes('since', ['string','integer']);

        return $resolver->resolve($data) + $data;
    }

    public function getComponentClassname(): string 
    {
        return "ux-copyright";
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