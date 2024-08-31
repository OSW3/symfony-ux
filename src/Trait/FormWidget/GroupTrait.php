<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait GroupTrait
{
    #[ExposeInTemplate(name: 'isGroup', getter: 'fetchGroup')]
    private bool $isGroup = false;

    private function groupResolver(&$resolver): static
    {
        $resolver->setDefault('isGroup', false);
        $resolver->setAllowedTypes('isGroup', ['bool']);

        return $this;
    }

    public function fetchGroup(): bool
    {
        return $this->isGroup;
    }
}