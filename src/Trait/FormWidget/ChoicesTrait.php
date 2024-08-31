<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait ChoicesTrait
{
    #[ExposeInTemplate(name: 'choices', getter: 'fetchChoices')]
    public array $choices = [];

    private function choicesResolver(&$resolver): static
    {
        $resolver->setDefault('choices', []);
        $resolver->setAllowedTypes('choices', ['array']);

        return $this;
    }

    public function fetchChoices(): array
    {
        return $this->choices;
    }
}