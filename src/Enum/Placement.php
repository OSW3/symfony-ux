<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum Placement: string 
{
    use EnumTrait;

    case TOP    = 'top';
    case RIGHT  = 'right';
    case BOTTOM = 'bottom';
    case LEFT   = 'left';
}