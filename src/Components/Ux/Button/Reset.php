<?php 
namespace OSW3\UX\Components\Ux\Button;

use OSW3\UX\Components\Ux\Button;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;


#[AsTwigComponent(template: '@SymfonyUx/button/base.twig')]
final class Reset extends Button 
{
    public function fetchType(): string 
    {
        $class = str_replace(__NAMESPACE__, '', __CLASS__);
        $class = substr($class, 1);
        return strtolower($class);
    }
}