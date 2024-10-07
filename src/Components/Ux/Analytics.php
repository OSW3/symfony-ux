<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Exception\ComponentException;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/analytics/base.twig')]
final class Analytics extends AbstractComponent
{
    public const NAME = "analytics";
    
    use DoNotExposeTrait;
    
    #[ExposeInTemplate(name: 'provider', getter: 'fetchProvider')]
    public string $provider;
    
    #[ExposeInTemplate(name: 'trackingId', getter: 'fetchTrackingId')]
    public string|int $trackingId;
    
    #[ExposeInTemplate(name: 'trackingUrl', getter: 'fetchTrackingUrl')]
    public string $trackingUrl;
    
    #[ExposeInTemplate(name: 'trackingDomain', getter: 'fetchTrackingDomain')]
    public string $trackingDomain;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setRequired('provider');
        $resolver->setAllowedTypes('provider', ['string']);

        $resolver->setDefault('trackingId', "");
        $resolver->setAllowedTypes('trackingId', ['string','integer']);

        $resolver->setDefault('trackingUrl', "");
        $resolver->setAllowedTypes('trackingUrl', ['string']);

        $resolver->setDefault('trackingDomain', "");
        $resolver->setAllowedTypes('trackingDomain', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchProvider()
    {
        $options  = $this->getConfig();
        $providers = array_keys($options);

        if (!in_array($this->provider, $providers)) {
            throw new \Exception(sprintf("Unrecognized provider \"%s\" for the \"%s\" component. Available options are \"%s\".", $this->provider, ucfirst(static::NAME), implode('","', $providers)));
        }

        if (empty($this->trackingId) && isset($options[$this->provider]['tracking_id'])) {
            $this->trackingId = $options[$this->provider]['tracking_id'];
        }

        if (empty($this->trackingUrl) && isset($options[$this->provider]['tracking_url'])) {
            $this->trackingUrl = $options[$this->provider]['tracking_url'];
        }

        if (empty($this->trackingDomain) && isset($options[$this->provider]['tracking_domain'])) {
            $this->trackingDomain = $options[$this->provider]['tracking_domain'];
        }

        return $this->provider;
    }

    public function fetchTrackingId()
    {
        return $this->trackingId;
    }

    public function fetchTrackingUrl()
    {
        return $this->trackingUrl;
    }

    public function fetchTrackingDomain()
    {
        return $this->trackingDomain;
    }
}