<?php 
namespace OSW3\UX\Components\Ux\FormWidget;

use OSW3\UX\Components\Ux\FormWidget;
use OSW3\UX\Enum\FormWidget\WidgetType;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/form-widget/bridge.twig')]
final class DateTime extends FormWidget 
{
    public function fetchType(): string 
    {
        return WidgetType::DATETIME->value;
    }

    public function fetchClass(): string
    {
        return "";
    }

    
}