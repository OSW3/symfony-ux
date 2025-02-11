<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait InlineTrait
{
    #[ExposeInTemplate(name: 'inline', getter: 'fetchInline')]
    public bool $inline = false;

    private function inlineResolver(&$resolver): static {
        $resolver->setDefault('inline', false);
        $resolver->setAllowedTypes('inline', ['bool']);

        return $this;
    }

    public function fetchInline(): bool {
        return $this->inline;
    }
}