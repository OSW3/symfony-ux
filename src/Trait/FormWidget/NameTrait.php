<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait NameTrait
{
    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public string|null $name = null;

    private function nameResolver(&$resolver): static
    {
        $resolver->setDefault('name', null);
        $resolver->setAllowedTypes('name', ['string','null']);

        return $this;
    }

    public function fetchName(): ?string
    {
        return $this->name;
    }
}