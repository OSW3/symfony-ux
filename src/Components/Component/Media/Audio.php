<?php 
namespace OSW3\UX\Components\Component\Media;

use OSW3\UX\Components\Component\Media;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/media/base.twig')]
final class Audio extends Media {
    public function fetchType(): string {
        $expected = "audio";
        $real = parent::fetchType();

        if ($expected !== $real) {
            throw new \Exception(sprintf("The expected media is %s but %s given.", $expected, $real));
        }

        return $expected;
    }
}