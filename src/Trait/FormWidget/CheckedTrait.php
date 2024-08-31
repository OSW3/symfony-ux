<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait CheckedTrait
{
    #[ExposeInTemplate(name: 'checked', getter: 'fetchChecked')]
    public bool $checked = false;

    private function checkedResolver(&$resolver): static
    {
        $resolver->setDefault('checked', false);
        $resolver->setAllowedTypes('checked', ['bool']);

        return $this;
    }

    public function fetchChecked(): bool
    {
        return $this->checked;
    }
}