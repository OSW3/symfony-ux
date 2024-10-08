<?php 
namespace OSW3\UX\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/void.twig')]
final class Ux 
{
    public function __construct()
    {
        // Todo: send an explicit message
        // Cannot call directly <twig:Ux />
        throw new \Exception('Ux cannot be called');
    }
}