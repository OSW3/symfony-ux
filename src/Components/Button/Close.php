<?php 
namespace OSW3\UX\Components\Button;

use OSW3\UX\Components\Button;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/button/base.twig')]
final class Close extends Button 
{
    public function fetchType(): string 
    {
        return "button";
    }

    public function fetchLabel(): string 
    {
        return "";
    }


    public function fetchClass(): string
    {
        $classlist[] = "{$this->getComponentClassname()}-close";

        return implode(" ", $classlist);
    }
}