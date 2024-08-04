<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum Justify: string 
{
    use EnumTrait;

    case START  = 'start';
    case CENTER = 'center';
    case END    = 'end';
    case fill   = 'fill';
}