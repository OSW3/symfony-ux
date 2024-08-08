<?php 
namespace OSW3\UX\Components\Analytics;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Exception\ComponentException;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/analytics/clicky/clicky.twig')]
final class Clicky extends AbstractComponent
{
    private const NAME = 'analytics';
    private const PROVIDER = 'clicky';
    
    use DoNotExposeTrait;
    
    #[ExposeInTemplate(name: 'trackingId', getter: 'fetchTrackingId')]
    public string|int $trackingId;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefault('trackingId', "");
        $resolver->setAllowedTypes('trackingId', ['string','integer']);

        return $resolver->resolve($data) + $data;
    }

    private function getConfig(): array 
    {
        return $this->config['components'][static::NAME];
    }
    
    public function getComponentClassname(): string 
    {
        return $this->prefix . static::NAME;
    }

    public function fetchTrackingId()
    {
        $options  = $this->getConfig();

        if (empty($this->trackingId) && isset($options[static::PROVIDER]['tracking_id'])) {
            $this->trackingId = $options[static::PROVIDER]['tracking_id'];
        }

        return $this->trackingId;
    }
}