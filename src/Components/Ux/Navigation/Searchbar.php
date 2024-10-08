<?php 
namespace OSW3\UX\Components\Ux\Navigation;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/navigation/bridge-searchbar.twig')]
final class Searchbar 
{
    public const NAME = "navigation";
}