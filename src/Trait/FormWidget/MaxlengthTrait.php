<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait MaxlengthTrait
{
    #[ExposeInTemplate(name: 'maxlength', getter: 'fetchMaxlength')]
    public string|int|null $maxlength = null;

    private function maxlengthResolver(&$resolver): static
    {
        $resolver->setDefault('maxlength', null);
        $resolver->setAllowedTypes('maxlength', ['string','integer','null']);

        return $this;
    }

    public function fetchMaxlength(): ?int
    {
        return is_numeric($this->maxlength) ? (int) $this->maxlength : null; 
    }
}