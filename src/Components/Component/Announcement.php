<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/announcement/base.twig')]
final class Announcement extends Component
{
    public const NAME = "announcement";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'messages', getter: 'fetchMessages')]
    public string $message;
    
    #[ExposeInTemplate(name: 'messages', getter: 'fetchMessages')]
    public array $messages;
    
    #[ExposeInTemplate(name: 'animated')]
    public string $animated;
    
    #[ExposeInTemplate(name: 'animation')]
    public string $animation;
    
    #[ExposeInTemplate(name: 'speed', getter: 'fetchSpeed')]
    public int $speed;
    
    #[ExposeInTemplate(name: 'pauseHover')]
    public bool $pauseHover;

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

        $resolver->setDefault('message', '');
        $resolver->setAllowedTypes('message', ['string']);

        $resolver->setDefault('messages', []);
        $resolver->setAllowedTypes('messages', ['array']);

        $resolver->setDefault('animated', $options['animated']);
        $resolver->setAllowedTypes('animated', ['string']);

        $resolver->setDefault('animation', $options['animation']);
        $resolver->setAllowedTypes('animation', ['string']);

        $resolver->setDefault('speed', $options['speed']);
        $resolver->setAllowedTypes('speed', ['integer']);

        $resolver->setDefault('pauseHover', $options['pause_hover']);
        $resolver->setAllowedTypes('pauseHover', ['bool']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchMessages(): array
    {
        $messages = [];

        if (!empty($this->messages)) {
            $messages = array_merge($messages, $this->messages);
        }

        if (empty($messages) && !empty($this->message)) {
            $messages[] = $this->message;
        }

        array_walk($messages, function (&$item) {
            $item = preg_replace_callback(
                '/<([a-zA-Z][a-zA-Z0-9]*)[^>]*>/i',
                fn($matches) => preg_replace('/&nbsp;/', ' ', $matches[0]),
                str_replace(" ", "&nbsp;", $item)
            );
        });
        return $messages;
    }

    public function fetchSpeed() {
        return match($this->animation) {
            'ticker' => match($this->speed) {
                0 => 0,
                1 => 90,
                2 => 80,
                3 => 60,
                4 => 40,
                5 => 20,
                6 => 15,
                7 => 10,
                8 => 5,
                9 => 1,
                default => 15,
            },
            'rotator' => match($this->speed) {
                0 => 0,
                1 => 20000,
                2 => 16000,
                3 => 12000,
                4 => 9000,
                5 => 7000,
                6 => 5000,
                7 => 3500,
                8 => 2000,
                9 => 1000,
                default => 5000,
            },
            default => 0,
        };
    }
}