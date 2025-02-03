<?php 
namespace OSW3\UX\Components\Component\Media;

use OSW3\UX\Components\Component\Media;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/media/base.twig')]
final class Pdf extends Media {
    public function fetchType(): string {
        $expected = "pdf";
        $real = parent::fetchType();

        if ($expected !== $real) {
            throw new \Exception(sprintf("The expected media is %s but %s given.", $expected, $real));
        }

        return $expected;
    }
}