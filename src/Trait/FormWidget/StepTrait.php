<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait StepTrait
{
    #[ExposeInTemplate(name: 'step', getter: 'fetchStep')]
    public string|null $step = null;
    private function stepResolver(&$resolver): static
    {
        $resolver->setDefault('step', null);
        $resolver->setAllowedTypes('step', ['string','null']);

        return $this;
    }

    public function fetchStep(): ?string
    {
        return $this->step;
    }
}