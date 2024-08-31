<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait RowsTrait
{
    #[ExposeInTemplate(name: 'rows', getter: 'fetchRows')]
    public string|int|null $rows = null;

    private function rowsResolver(&$resolver): static
    {
        $resolver->setDefault('rows', null);
        $resolver->setAllowedTypes('rows', ['string','integer','null']);

        return $this;
    }

    public function fetchRows(): ?int
    {
        return is_numeric($this->rows) ? (int) $this->rows : null; 
    }
}