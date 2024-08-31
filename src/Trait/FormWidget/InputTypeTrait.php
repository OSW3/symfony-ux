<?php 
namespace OSW3\UX\Trait\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait InputTypeTrait
{
    #[ExposeInTemplate(name: 'type', getter: 'fetchType')]
    public string $type = Type::TEXT->value;

    private function typeResolver(&$resolver): static
    {
        $resolver->setDefault('type', Type::TEXT->value);
        $resolver->setAllowedValues('type', Type::toArray());
        $resolver->setAllowedTypes('type', ['string']);

        return $this;
    }

    public function fetchType(): ?string
    {
        return $this->type;
    }
}