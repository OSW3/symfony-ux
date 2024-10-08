<?php 
namespace OSW3\UX\Components\Ux\Analytics;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Exception\ComponentException;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/analytics/matomo/matomo.twig')]
final class Matomo extends AbstractComponent
{
    public const NAME = 'analytics';
    private const PROVIDER = 'matomo';
    
    use DoNotExposeTrait;
    
    #[ExposeInTemplate(name: 'trackingId', getter: 'fetchTrackingId')]
    public string|int $trackingId;
    
    #[ExposeInTemplate(name: 'trackingUrl', getter: 'fetchTrackingUrl')]
    public string $trackingUrl;
    
    #[ExposeInTemplate(name: 'trackingDomain', getter: 'fetchTrackingDomain')]
    private string $trackingDomain;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefault('trackingId', "");
        $resolver->setAllowedTypes('trackingId', ['string','integer']);

        $resolver->setDefault('trackingUrl', "");
        $resolver->setAllowedTypes('trackingUrl', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchTrackingId(): string|int
    {
        $options  = $this->getConfig();

        if (empty($this->trackingId) && isset($options[static::PROVIDER]['tracking_id'])) {
            $this->trackingId = $options[static::PROVIDER]['tracking_id'];
        }

        return $this->trackingId;
    }

    public function fetchTrackingUrl(): string
    {
        $options  = $this->getConfig();

        if (empty($this->trackingUrl) && isset($options[static::PROVIDER]['tracking_url'])) {
            $this->trackingUrl = $options[static::PROVIDER]['tracking_url'];
        }

        if (substr($this->trackingUrl, -1) === "/") {
            $this->trackingUrl = substr($this->trackingUrl, 0, -1);
        }
        $this->trackingUrl .= "/";

        return $this->trackingUrl;
    }

    public function fetchTrackingDomain(): string
    {
        $domain = explode("://", $this->trackingUrl);
        $domain = end($domain);

        if (substr($domain, -1) === "/") {
            $domain = substr($domain, 0, -1);
        }

        return $domain;
    }
}