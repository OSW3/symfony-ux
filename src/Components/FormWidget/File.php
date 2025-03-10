<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
final class File extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::FILE->value;
    }

    public function fetchIcon(): string 
    {
        return "fa-solid fa-upload";
    }

    public function fetchClass(): string
    {
        return "";
    }
}