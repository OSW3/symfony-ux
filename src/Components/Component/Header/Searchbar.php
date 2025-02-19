<?php 
namespace OSW3\UX\Components\Component\Header;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/header/bridge-searchbar.twig')]
final class Searchbar 
{
    public const NAME = "header";
}