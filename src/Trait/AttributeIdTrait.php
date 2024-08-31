<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeIdTrait
{
    #[ExposeInTemplate(name: 'id', getter: 'fetchId')]
    public string|null $id;

    private function idResolver(&$resolver): static
    {
        $resolver->setDefault('id', null);
        $resolver->setAllowedTypes('id', ['string','null']);

        return $this;
    }

    public function fetchId(): ?string
    {
        return $this->id;
    }
}