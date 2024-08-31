<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait NoInteractionTrait
{
    #[ExposeInTemplate(name: 'noInteraction', getter: 'fetchNoInteraction')]
    public bool $noInteraction = false;

    private function noInteractionResolver(&$resolver): static
    {
        $resolver->setDefault('noInteraction', false);
        $resolver->setAllowedTypes('noInteraction', ['bool']);

        return $this;
    }

    public function fetchNoInteraction(): bool
    {
        return $this->noInteraction;
    }
}