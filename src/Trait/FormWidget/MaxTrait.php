<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait MaxTrait
{
    #[ExposeInTemplate(name: 'max', getter: 'fetchMax')]
    public string|int|null $max = null;

    private function maxResolver(&$resolver): static
    {
        $resolver->setDefault('max', null);
        $resolver->setAllowedTypes('max', ['string','integer','null']);

        return $this;
    }

    public function fetchMax(): ?int
    {
        return is_numeric($this->max) ? (int) $this->max : null; 
    }
}