<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait SizeTrait
{
    #[ExposeInTemplate(name: 'size', getter: 'fetchSize')]
    public string|int|null $size = null;

    private function sizeResolver(&$resolver): static
    {
        $resolver->setDefault('size', null);
        $resolver->setAllowedTypes('size', ['string','integer','null']);

        return $this;
    }

    public function fetchSize(): ?string
    {
        return $this->size;
    }
}