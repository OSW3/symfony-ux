<?php 
namespace OSW3\UX\Components\Ux\Navigation;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/navigation/bridge-template.twig')]
final class Template 
{
    public const NAME = "navigation";
}