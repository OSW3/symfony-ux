<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeClassTrait
{    
    #[ExposeInTemplate(name: 'class', getter: 'fetchClass')]
    public string|null $class;

    private function classResolver(&$resolver): static
    {
        $resolver->setDefault('class', null);
        $resolver->setAllowedTypes('class', ['string', 'null']);

        return $this;
    }

    public function fetchClass(): string
    {
        return implode(" ", $this->classList());
    }

    public function classList(): array
    {
        $classList = [];

        if (method_exists($this, 'getComponentClassname')) {
            $classList[] = $this->getComponentClassname();
        }
        
        if(!empty($this->class)) {
            $classList[] = $this->class;
        }

        return $classList;
    }
}