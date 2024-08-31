<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait MultipleTrait
{
    #[ExposeInTemplate(name: 'multiple', getter: 'fetchMultiple')]
    public bool $multiple = false;

    private function multipleResolver(&$resolver): static
    {
        $resolver->setDefault('multiple', false);
        $resolver->setAllowedTypes('multiple', ['bool']);

        return $this;
    }

    public function fetchMultiple(): bool
    {
        return $this->multiple;
    }
}