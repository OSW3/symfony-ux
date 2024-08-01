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
    
    const NAME = "copyright";

    private array $params;

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

    public function __construct(
        #[Autowire(service: 'service_container')] private ContainerInterface $container,
    )
    {
        $this->params = $container->getParameter(Configuration::NAME);
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

        $resolver->setDefault('symbol', $this->params[static::NAME]['symbol']);
        $resolver->setAllowedTypes('symbol', ['string']);

        $resolver->setDefault('datesSeparator', $this->params[static::NAME]['dates_separator']);
        $resolver->setAllowedTypes('datesSeparator', ['string']);

        $resolver->setDefault('separator', $this->params[static::NAME]['separator']);
        $resolver->setAllowedTypes('separator', ['string']);

        $resolver->setDefault('company', $this->params[static::NAME]['company']);
        $resolver->setAllowedTypes('company', ['null', 'string']);

        $resolver->setDefault('since', $this->params[static::NAME]['since']);
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