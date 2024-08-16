<?php 
namespace OSW3\UX\Enum\Announcement\Animation;

use OSW3\UX\Trait\EnumTrait;

enum Type: string 
{
    use EnumTrait;

    case SCROLL = 'scroll';
    case FADE   = 'fade';
    case NONE   = 'none';
}