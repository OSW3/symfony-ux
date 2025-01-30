<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum PlacementLayout: string 
{
    use EnumTrait;

    case TOP_LEFT      = 'top-left';
    case TOP_CENTER    = 'top-center';
    case TOP_RIGHT     = 'top-right';
    case MIDDLE_LEFT   = 'middle-left';
    case MIDDLE_CENTER = 'middle-center';
    case CENTERED      = 'centered';
    case MIDDLE_RIGHT  = 'middle-right';
    case BOTTOM_LEFT   = 'bottom-left';
    case BOTTOM_CENTER = 'bottom-center';
    case BOTTOM_RIGHT  = 'bottom-right';
}