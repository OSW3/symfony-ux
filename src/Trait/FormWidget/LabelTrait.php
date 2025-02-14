<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait LabelTrait
{
    #[ExposeInTemplate(name: 'label', getter: 'fetchLabel')]
    public string|null $label = null;

    #[ExposeInTemplate(name: 'labelEllipsis', getter: 'fetchLabelEllipsis')]
    public bool $labelEllipsis;

    #[ExposeInTemplate(name: 'labelHidden', getter: 'fetchLabelHidden')]
    public bool $labelHidden;

    #[ExposeInTemplate(name: 'labelIcon', getter: 'fetchLabelIcon')]
    public string|null $labelIcon;

    #[ExposeInTemplate(name: 'labelTitle', getter: 'fetchLabelTitle')]
    public string|null $labelTitle;

    private function labelResolver(&$resolver): static
    {
        $resolver->setDefault('label', null);
        $resolver->setAllowedTypes('label', ['string','null']);

        $resolver->setDefault('labelEllipsis', true);
        $resolver->setAllowedTypes('labelEllipsis', ['bool']);

        $resolver->setDefault('labelHidden', false);
        $resolver->setAllowedTypes('labelHidden', ['bool']);

        $resolver->setDefault('labelIcon', null);
        $resolver->setAllowedTypes('labelIcon', ['string','null']);

        $resolver->setDefault('labelTitle', null);
        $resolver->setAllowedTypes('labelTitle', ['string','null']);

        return $this;
    }

    public function fetchLabel(): ?string {
        return $this->label;
    }

    public function fetchLabelEllipsis(): bool {
        return $this->labelEllipsis;
    }

    public function fetchLabelHidden(): bool {
        return $this->labelHidden;
    }

    public function fetchLabelIcon(): ?string {
        return $this->labelIcon;
    }

    public function fetchLabelTitle(): ?string {
        return $this->labelTitle;
    }
}