<?php 
namespace OSW3\UX\Components\Component\Alert;

use OSW3\UX\Components\Component\Alert;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/alert/base.twig')]
final class Light extends Alert
{
    public function fetchType(): string 
    {
        $class = str_replace(__NAMESPACE__, '', __CLASS__);
        $class = substr($class, 1);
        return strtolower($class);
    }
}