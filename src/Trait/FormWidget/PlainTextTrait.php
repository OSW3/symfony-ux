<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait PlainTextTrait
{
    #[ExposeInTemplate(name: 'plainText', getter: 'fetchPlainText')]
    public bool $plainText = false;

    private function plainTextResolver(&$resolver): static
    {
        $resolver->setDefault('plainText', false);
        $resolver->setAllowedTypes('plainText', ['bool']);

        return $this;
    }

    public function fetchPlainText(): bool
    {
        return $this->plainText;
    }
}