<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait IconTrait
{
    #[ExposeInTemplate(name: 'icon', getter: 'fetchIcon')]
    public string|null $icon;

    #[ExposeInTemplate(name: 'iconPosition', getter: 'fetchIconPosition')]
    public string $iconPosition;

    #[ExposeInTemplate(name: 'iconType')]
    public string|null $iconType;

    private function iconResolver(&$resolver): static
    {
        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string','null']);

        $resolver->setDefault('iconPosition', "start");
        $resolver->setAllowedValues('iconPosition', ['start','end']);
        $resolver->setAllowedTypes('iconPosition', ['string']);

        $resolver->setDefault('iconType', 'font');
        $resolver->setAllowedValues('iconType', [null, 'font','img','symbol']);
        $resolver->setAllowedTypes('iconType', ['string','null']);

        return $this;
    }

    public function fetchIcon(): ?string {
        preg_match('/^([^:]+):(.*)$/', $this->icon, $matches);

        $this->iconType = $matches[1] ?? $this->iconType;
        $this->icon = $matches[2] ?? $this->icon;

        return $this->icon;
    }

    public function fetchIconPosition(): ?string {
        return $this->iconPosition;
    }
}