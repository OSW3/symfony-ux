<?php 
namespace OSW3\UX\Components\Navigation;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/navigation/bridge-searchbar.twig')]
final class Searchbar 
{
    public const NAME = "navigation";
}