<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/announcement/base.twig')]
final class Announcement extends AbstractComponent
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
    
    #[ExposeInTemplate(name: 'orientation')]
    public string $orientation;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
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

        $resolver->setDefault('orientation', 'horizontal');
        $resolver->setAllowedTypes('orientation', ['string']);

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

        return $messages;
    }
}