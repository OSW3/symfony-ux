<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeStyleTrait
{
    #[ExposeInTemplate(name: 'style', getter: 'fetchStyle')]
    public array $style;

    private function styleResolver(&$resolver): static
    {
        $resolver->setDefault('style', []);
        $resolver->setAllowedTypes('style', ['array']);

        return $this;
    }

    public function fetchStyle(): string
    {
        $options = [];
        $style = '';
        
        foreach ($options as $property => $value)
        {
            $style.= "{$property}:{$value};";
        }

        return $style;
    }
}