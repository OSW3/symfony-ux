<?php 
namespace OSW3\UX\Components\Button;

use OSW3\UX\Components\Button;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/button/base.twig')]
final class Submit extends Button 
{
    public function fetchType(): string 
    {
        $class = str_replace(__NAMESPACE__, '', __CLASS__);
        $class = substr($class, 1);
        return strtolower($class);
    }
}