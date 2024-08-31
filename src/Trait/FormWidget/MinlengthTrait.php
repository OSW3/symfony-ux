<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait MinlengthTrait
{
    #[ExposeInTemplate(name: 'minlength', getter: 'fetchMinlength')]
    public string|int|null $minlength = null;

    private function minlengthResolver(&$resolver): static
    {
        $resolver->setDefault('minlength', null);
        $resolver->setAllowedTypes('minlength', ['string','integer','null']);

        return $this;
    }

    public function fetchMinlength(): ?int
    {
        return is_numeric($this->minlength) ? (int) $this->minlength : null; 
    }
}