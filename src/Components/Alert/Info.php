<?php 
namespace OSW3\UX\Components\Alert;

use OSW3\UX\Components\Alert;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/alert/base.twig')]
final class Info extends Alert
{
    public function fetchType(): string 
    {
        $class = str_replace(__NAMESPACE__, '', __CLASS__);
        $class = substr($class, 1);
        return strtolower($class);
    }
}