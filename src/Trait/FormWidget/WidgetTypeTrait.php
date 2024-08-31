<?php 
namespace OSW3\UX\Trait\FormWidget;

use OSW3\UX\Enum\FormWidget\WidgetType;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait WidgetTypeTrait
{
    #[ExposeInTemplate(name: 'type', getter: 'fetchType')]
    public string $type = WidgetType::TEXT->value;

    private function typeResolver(&$resolver): static
    {
        $resolver->setDefault('type', WidgetType::TEXT->value);
        $resolver->setAllowedValues('type', WidgetType::toArray());
        $resolver->setAllowedTypes('type', ['string']);

        return $this;
    }

    public function fetchType(): ?string
    {
        return $this->type;
    }
}