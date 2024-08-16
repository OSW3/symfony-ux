<?php 
namespace OSW3\UX\Twig\Extension;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use OSW3\UX\Twig\Runtime\UtilsExtensionRuntime;

class UtilsExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('classname', [UtilsExtensionRuntime::class, 'getUxClassName']),
            new TwigFunction('_add_attribute', [UtilsExtensionRuntime::class, 'addAttribute']),
            new TwigFunction('_get_attributes', [UtilsExtensionRuntime::class, 'getAttributes'], ['is_safe' => ['html']]),
        ];
    }
}
