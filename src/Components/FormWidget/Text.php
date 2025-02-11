<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
final class Text extends FormWidget
{
    public function fetchType(): string 
    {
        return Type::TEXT->value;
    }
    
    public function fetchClass(): string
    {
        return "";
    }
}