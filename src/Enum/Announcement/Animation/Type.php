<?php 
namespace OSW3\UX\Enum\Announcement\Animation;

use OSW3\UX\Trait\EnumTrait;

enum Type: string 
{
    use EnumTrait;

    case TICKER  = 'ticker';
    case ROTATOR = 'rotator';
    case NONE    = 'none';
}