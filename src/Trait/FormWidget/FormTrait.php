<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait FormTrait
{
    #[ExposeInTemplate(name: 'form', getter: 'fetchForm')]
    public string|null $form = null;

    private function formResolver(&$resolver): static
    {
        $resolver->setDefault('form', null);
        $resolver->setAllowedTypes('form', ['string','null']);

        return $this;
    }

    public function fetchForm(): ?string
    {
        return $this->form;
    }
}