<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait DisabledTrait
{
    #[ExposeInTemplate(name: 'disabled', getter: 'fetchDisabled')]
    public bool $disabled = false;

    private function disabledResolver(&$resolver): static
    {
        $resolver->setDefault('disabled', false);
        $resolver->setAllowedTypes('disabled', ['bool']);

        return $this;
    }

    public function fetchDisabled(): bool
    {
        return $this->disabled;
    }
}