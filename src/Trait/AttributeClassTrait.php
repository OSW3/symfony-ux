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
        return implode(" ", $this->classList());
    }

    private function classList(): array
    {
        $classList = [];

        if (method_exists($this, 'getComponentClassname')) {
            $classList = [$this->getComponentClassname()];
        }
        
        $classList[] = $this->class;

        return $classList;
    }
}