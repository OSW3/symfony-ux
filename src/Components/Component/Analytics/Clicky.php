<?php 
namespace OSW3\UX\Components\Component\Analytics;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\Component;
use OSW3\UX\Exception\ComponentException;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/analytics/clicky/clicky.twig')]
final class Clicky extends Component
{
    public const NAME = 'analytics';
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

    public function fetchTrackingId(): string
    {
        $options  = $this->getConfig();

        if (empty($this->trackingId) && isset($options[static::PROVIDER]['tracking_id'])) {
            $this->trackingId = $options[static::PROVIDER]['tracking_id'];
        }

        if (empty($this->trackingId)) {
            throw new \Exception("Tracking ID is missing: please ensure it is configured under the '" . static::PROVIDER . "' provider settings.");
        }

        return $this->trackingId;
    }
}