<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum PlacementX: string 
{
    use EnumTrait;

    case RIGHT  = 'right';
    case LEFT   = 'left';
}