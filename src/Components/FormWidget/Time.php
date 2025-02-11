<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
final class Time extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::TIME->value;
    }

    public function fetchClass(): string
    {
        return "";
    }


    public function fetchFormat(): string|array
    {
        if (empty($this->format)) {
            $this->format = ['hour','minute'];
        }

        return $this->parseTimeFormat($this->format);
    }
}