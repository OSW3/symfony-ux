<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait PlaceholderTrait
{
    #[ExposeInTemplate(name: 'placeholder', getter: 'fetchPlaceholder')]
    public string|null $placeholder = null;

    private function placeholderResolver(&$resolver): static
    {
        $resolver->setDefault('placeholder', null);
        $resolver->setAllowedTypes('placeholder', ['string','null']);

        return $this;
    }

    public function fetchPlaceholder(): ?string
    {
        return $this->placeholder;
    }
}