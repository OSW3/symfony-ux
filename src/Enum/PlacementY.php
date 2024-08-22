<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum PlacementY: string 
{
    use EnumTrait;

    case TOP    = 'top';
    case BOTTOM = 'bottom';
}