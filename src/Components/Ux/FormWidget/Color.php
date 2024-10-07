<?php 
namespace OSW3\UX\Components\Ux\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\Ux\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/form-widget/bridge.twig')]
final class Color extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::COLOR->value;
    }

    public function fetchClass(): string
    {
        return "";
    }
}