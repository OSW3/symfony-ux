<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
final class Radio extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::RADIO->value;
    }

    public function fetchClass(): string
    {
        return "";
    }
}