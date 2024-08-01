<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeClassTrait
{    
    #[ExposeInTemplate(name: 'class', getter: 'fetchClass')]
    public string $class;

    private function classResolver(&$resolver): static
    {
        $resolver->setDefault('class', "");
        $resolver->setAllowedTypes('class', ['string']);

        return $this;
    }

    public function fetchClass(): string
    {
        $classList = [static::NAME];
        $classList[] = $this->class;

        return implode(" ", $classList);
    }
}