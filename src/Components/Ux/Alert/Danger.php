<?php 
namespace OSW3\UX\Components\Ux\Alert;

use OSW3\UX\Components\Ux\Alert;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/alert/base.twig')]
final class Danger extends Alert
{
    public function fetchType(): string 
    {
        $class = str_replace(__NAMESPACE__, '', __CLASS__);
        $class = substr($class, 1);
        return strtolower($class);
    }
}