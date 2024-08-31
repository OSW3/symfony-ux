<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait MinTrait
{
    #[ExposeInTemplate(name: 'min', getter: 'fetchMin')]
    public string|int|null $min = null;

    private function minResolver(&$resolver): static
    {
        $resolver->setDefault('min', null);
        $resolver->setAllowedTypes('min', ['string','integer','null']);

        return $this;
    }

    public function fetchMin(): ?int
    {
        return is_numeric($this->min) ? (int) $this->min : null; 
    }
}