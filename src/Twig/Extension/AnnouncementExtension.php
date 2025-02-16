<?php 
namespace OSW3\UX\Twig\Extension;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use OSW3\UX\Twig\Runtime\AnnouncementExtensionRuntime;

class AnnouncementExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getAnnouncementMessages', [AnnouncementExtensionRuntime::class, 'getAnnouncementMessages']),
        ];
    }
}