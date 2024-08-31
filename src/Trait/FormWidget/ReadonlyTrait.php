<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait ReadonlyTrait
{
    #[ExposeInTemplate(name: 'readonly', getter: 'fetchReadonly')]
    public bool $readonly = false;

    private function readonlyResolver(&$resolver): static
    {
        $resolver->setDefault('readonly', false);
        $resolver->setAllowedTypes('readonly', ['bool']);

        return $this;
    }

    public function fetchReadonly(): bool
    {
        return $this->readonly;
    }
}