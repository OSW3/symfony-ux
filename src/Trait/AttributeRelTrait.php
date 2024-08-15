<?php 
namespace OSW3\UX\Trait;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait AttributeRelTrait
{    
    #[ExposeInTemplate(name: 'rel', getter: 'fetchRel')]
    private string $rel;

    public function fetchRel(): string
    {
        return "js-" . $this->prefix . static::NAME;
    }
}