<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait SpellcheckTrait
{
    #[ExposeInTemplate(name: 'spellcheck', getter: 'fetchSpellcheck')]
    public bool|null $spellcheck = true;

    private function spellcheckResolver(&$resolver): static
    {
        $resolver->setDefault('spellcheck', true);
        $resolver->setAllowedTypes('spellcheck', ['bool','null']);

        return $this;
    }

    public function fetchSpellcheck(): bool
    {
        return !!$this->spellcheck;
    }
}