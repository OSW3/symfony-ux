<?php 
namespace OSW3\UX\Components\Component\Map;

use OSW3\UX\Components\Component\Map;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/map/base.twig')]
final class Here extends Map 
{
    public function fetchProvider(): string {
        return 'here';
    }
}