<?php 
namespace OSW3\UX\Components\Component\Header;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/header/bridge-template.twig')]
final class Template 
{
    public const NAME = "header";
}