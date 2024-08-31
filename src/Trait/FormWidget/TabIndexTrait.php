<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait TabIndexTrait
{
    #[ExposeInTemplate(name: 'tabindex', getter: 'fetchTabIndex')]
    public string|int|null $tabindex = null;

    private function tabIndexResolver(&$resolver): static
    {
        $resolver->setDefault('tabindex', null);
        $resolver->setAllowedTypes('tabindex', ['string','integer','null']);

        return $this;
    }

    public function fetchTabIndex(): ?int
    {
        return is_numeric($this->tabindex) ? (int) $this->tabindex : null; 
    }
}