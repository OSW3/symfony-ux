<?php 
namespace OSW3\UX\Components\Ux\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\Ux\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
final class Money extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::NUMBER->value;
    }

    public function fetchStep(): string
    {
        return empty($this->step) ? "0.01" : $this->step;
    }

    public function fetchClass(): string
    {
        return "";
    }
}