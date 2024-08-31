<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait ValueTrait
{
    #[ExposeInTemplate(name: 'value', getter: 'fetchValue')]
    public string|array|null $value = null;

    private function valueResolver(&$resolver): static
    {
        $resolver->setDefault('value', null);
        $resolver->setAllowedTypes('value', ['string','array','null']);

        return $this;
    }

    public function fetchValue(): string|array|null
    {
        return $this->value;
    }
}