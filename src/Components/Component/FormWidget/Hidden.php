<?php 
namespace OSW3\UX\Components\Component\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\Component\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
final class Hidden extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::HIDDEN->value;
    }

    public function fetchContainer(): bool
    {
        return false;
    }

    public function fetchClass(): string
    {
        return "";
    }
}