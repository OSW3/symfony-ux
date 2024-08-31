<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait ColsTrait
{
    #[ExposeInTemplate(name: 'cols', getter: 'fetchCols')]
    public string|int|null $cols = null;

    private function colsResolver(&$resolver): static
    {
        $resolver->setDefault('cols', null);
        $resolver->setAllowedTypes('cols', ['string','integer','null']);

        return $this;
    }

    public function fetchCols(): ?int
    {
        return is_numeric($this->cols) ? (int) $this->cols : null; 
    }
}