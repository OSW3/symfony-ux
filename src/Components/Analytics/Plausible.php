<?php 
namespace OSW3\UX\Components\Analytics;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/analytics/plausible/plausible.twig')]
final class Plausible extends AbstractComponent
{
    private const NAME = 'analytics';
    private const PROVIDER = 'plausible';
    
    use DoNotExposeTrait;
    
    #[ExposeInTemplate(name: 'trackingDomain', getter: 'fetchTrackingDomain')]
    public string $trackingDomain;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefault('trackingDomain', "");
        $resolver->setAllowedTypes('trackingDomain', ['string']);

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

    public function fetchTrackingDomain(): string
    {
        $options  = $this->getConfig();

        if (empty($this->trackingDomain) && isset($options[static::PROVIDER]['tracking_domain'])) {
            $this->trackingDomain = $options[static::PROVIDER]['tracking_domain'];
        }

        return $this->trackingDomain;
    }
}