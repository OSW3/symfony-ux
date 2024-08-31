<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait SelectedTrait
{
    #[ExposeInTemplate(name: 'selected', getter: 'fetchSelected')]
    public string|int|null $selected = null;

    private function selectedResolver(&$resolver): static
    {
        $resolver->setDefault('selected', null);
        $resolver->setAllowedTypes('selected', ['string','integer','null']);

        return $this;
    }

    public function fetchSelected(): string|int|null
    {
        return $this->selected;
    }
}