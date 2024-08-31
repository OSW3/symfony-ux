<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AcceptTrait
{
    #[ExposeInTemplate(name: 'accept', getter: 'fetchAccept')]
    public string|array $accept = [];

    private function acceptResolver(&$resolver): static
    {
        $resolver->setDefault('accept', []);
        $resolver->setAllowedTypes('accept', ['string','array']);

        return $this;
    }

    public function fetchAccept(): ?string
    {
        if (!is_array($this->accept)) {
            $this->accept = explode(",", $this->accept);
        }
        
        return implode(",", $this->accept);
    }
}