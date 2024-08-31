<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait RequiredTrait
{
    #[ExposeInTemplate(name: 'required', getter: 'fetchRequired')]
    public bool $required = false;

    private function requiredResolver(&$resolver): static
    {
        $resolver->setDefault('required', false);
        $resolver->setAllowedTypes('required', ['bool']);

        return $this;
    }

    public function fetchRequired(): bool
    {
        return $this->required;
    }
}