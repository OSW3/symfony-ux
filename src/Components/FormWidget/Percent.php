<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
final class Percent extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::NUMBER->value;
    }

    public function fetchIcon(): string 
    {
        return !empty($this->icon) ? $this->icon : "fa-solid fa-percent";
    }

    public function fetchIconPosition(): ?string
    {
        return "end";
    }

    public function fetchClass(): string
    {
        return "";
    }
}