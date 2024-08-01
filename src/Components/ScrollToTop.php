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

#[AsTwigComponent(template: '@UxComponents/scroll-to-top/base.twig')]
final class ScrollToTop
{
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    const NAME = "scroll_to_top";

    private array $options;

    #[ExposeInTemplate(name: 'title', getter: 'fetchTitle')]
    public string $title;

    #[ExposeInTemplate(name: 'symbol', getter: 'fetchSymbol')]
    public string $symbol;

   #[ExposeInTemplate(name: 'topAt', getter: 'doNotExpose')]
   public int $topAt;

   #[ExposeInTemplate(name: 'toggleAt', getter: 'doNotExpose')]
   public int $toggleAt;

    public function __construct(
        #[Autowire(service: 'service_container')] private ContainerInterface $container,
    )
    {
        $params = $container->getParameter(Configuration::NAME);
        $this->options = $params['component'][static::NAME];
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

        $resolver->setDefault('title', $this->options['title']);
        $resolver->setAllowedTypes('title', ['string']);

        $resolver->setDefault('symbol', $this->options['symbol']);
        $resolver->setAllowedTypes('symbol', ['string']);

        $resolver->setDefault('topAt', $this->options['top_at']);
        $resolver->setAllowedTypes('topAt', ['numeric']);

        $resolver->setDefault('toggleAt', $this->options['toggle_at']);
        $resolver->setAllowedTypes('toggleAt', ['numeric']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchTitle(): string
    {
        return $this->title;
    }

    public function fetchSymbol(): string
    {
        return $this->symbol;
    }
}