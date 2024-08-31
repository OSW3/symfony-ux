<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/form-widget/bridge.twig')]
final class Month extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::MONTH->value;
    }

    public function fetchClass(): string
    {
        return "";
    }
}