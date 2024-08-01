<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeIdTrait
{
    #[ExposeInTemplate(name: 'id')]
    public string $id;

    private function idResolver(&$resolver): static
    {
        $resolver->setDefault('id', "");
        $resolver->setAllowedTypes('id', ['string']);

        return $this;
    }
}