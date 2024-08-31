<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait IconTrait
{
    #[ExposeInTemplate(name: 'icon', getter: 'fetchIcon')]
    public string|null $icon = null;

    #[ExposeInTemplate(name: 'iconPosition', getter: 'fetchIconPosition')]
    public string $iconPosition = "start";

    private function iconResolver(&$resolver): static
    {
        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string','null']);

        $resolver->setDefault('iconPosition', "start");
        $resolver->setAllowedValues('iconPosition', ['start','end']);
        $resolver->setAllowedTypes('iconPosition', ['string']);

        return $this;
    }

    public function fetchIcon(): ?string
    {
        return $this->icon;
    }

    public function fetchIconPosition(): ?string
    {
        return $this->iconPosition;
    }
}