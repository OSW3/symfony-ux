<?php 
namespace OSW3\UX\Components\Ux\Button;

use OSW3\UX\Components\Ux\Button;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/button/base.twig')]
final class Close extends Button 
{
    // role="close"
    
    #[ExposeInTemplate(name: 'role', getter: 'fetchRole')]
    private bool $role;

    public function fetchRole()
    {
        return "close";
    }

    public function fetchType(): string 
    {
        return "button";
    }

    public function fetchLabel(): string 
    {
        return "";
    }


    public function fetchClass(): string
    {
        $classlist[] = "{$this->getComponentClassname()}-close";

        return implode(" ", $classlist);
    }
}