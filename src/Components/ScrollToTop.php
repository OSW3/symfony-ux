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

    private array $params;

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

        $resolver->setDefault('title', $this->params[static::NAME]['title']);
        $resolver->setAllowedTypes('title', ['string']);

        $resolver->setDefault('symbol', $this->params[static::NAME]['symbol']);
        $resolver->setAllowedTypes('symbol', ['string']);

        $resolver->setDefault('topAt', $this->params[static::NAME]['top_at']);
        $resolver->setAllowedTypes('topAt', ['numeric']);

        $resolver->setDefault('toggleAt', $this->params[static::NAME]['toggle_at']);
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