<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AutofocusTrait
{
    #[ExposeInTemplate(name: 'autofocus', getter: 'fetchAutofocus')]
    public bool $autofocus = false;

    private function autofocusResolver(&$resolver): static
    {
        $resolver->setDefault('autofocus', false);
        $resolver->setAllowedTypes('autofocus', ['bool']);

        return $this;
    }

    public function fetchAutofocus(): bool
    {
        return $this->autofocus;
    }
}