<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/scroll-to-top/base.twig')]
final class ScrollToTop extends AbstractComponent
{    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;



    #[ExposeInTemplate(name: 'title', getter: 'fetchTitle')]
    public string $title;

    #[ExposeInTemplate(name: 'symbol', getter: 'fetchSymbol')]
    public string $symbol;

    #[ExposeInTemplate(name: 'topAt', getter: 'doNotExpose')]
    public int $topAt;

    #[ExposeInTemplate(name: 'toggleAt', getter: 'doNotExpose')]
    public int $toggleAt;

    #[ExposeInTemplate(name: 'rel', getter: 'fetchRel')]
    private string $rel;
    


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

        $resolver->setDefault('title', $options['title']);
        $resolver->setAllowedTypes('title', ['string']);

        $resolver->setDefault('symbol', $options['symbol']);
        $resolver->setAllowedTypes('symbol', ['string']);

        $resolver->setDefault('topAt', $options['top_at']);
        $resolver->setAllowedTypes('topAt', ['numeric']);

        $resolver->setDefault('toggleAt', $options['toggle_at']);
        $resolver->setAllowedTypes('toggleAt', ['numeric']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['scroll_to_top'];
    }

    protected function getComponentClassname(): string 
    {
        return "{$this->prefix}scroll-to-top";
    }



    public function fetchTitle(): string
    {
        return $this->title;
    }

    public function fetchSymbol(): string
    {
        return $this->symbol;
    }

    public function fetchRel(): string
    {
        return "js-{$this->getComponentClassname()}";
    }
}