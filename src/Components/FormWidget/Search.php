<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/form-widget/bridge.twig')]
final class Search extends FormWidget
{
    public function fetchType(): string 
    {
        return Type::SEARCH->value;
    }

    public function fetchClass(): string
    {
        return "";
    }
}