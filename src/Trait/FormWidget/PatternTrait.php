<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait PatternTrait
{
    #[ExposeInTemplate(name: 'pattern', getter: 'fetchPattern')]
    public string|null $pattern = null;

    private function patternResolver(&$resolver): static
    {
        $resolver->setDefault('pattern', null);
        $resolver->setAllowedTypes('pattern', ['string','null']);

        return $this;
    }

    public function fetchPattern(): ?string
    {
        return $this->pattern;
    }
}