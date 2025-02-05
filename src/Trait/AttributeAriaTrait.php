<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeAriaTrait
{
    #[ExposeInTemplate(name: 'aria', getter: 'fetchAria')]
    public array $aria;

    private function ariaResolver(&$resolver): static
    {
        $resolver->setDefault('aria', []);
        $resolver->setAllowedTypes('aria', ['array']);

        return $this;
    }

    public function fetchAria(): array
    {
        $aria = [];
        $aria = array_merge($aria, $this->aria);
        
        foreach ($aria as $property => $value)
        {
            $aria["aria-{$property}"] = $value;
            unset($aria[$property]);
        }

        return $aria;
    }
}