<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AutocompleteTrait
{
    #[ExposeInTemplate(name: 'autocomplete', getter: 'fetchAutocomplete')]
    public string|bool|null $autocomplete = null;

    private function autocompleteResolver(&$resolver): static
    {
        $resolver->setDefault('autocomplete', null);
        $resolver->setAllowedTypes('autocomplete', ['string','bool','null']);

        return $this;
    }

    public function fetchAutocomplete(): ?string
    {
        if (is_bool($this->autocomplete)) {
            $this->autocomplete = $this->autocomplete ? "on" : "off";
        }

        if (!in_array($this->autocomplete, ['on', 'off'])) {
            $this->autocomplete = null;
        }

        return $this->autocomplete;
    }
}