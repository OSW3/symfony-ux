<?php 
namespace OSW3\UX\Enum\Announcement\Animation;

use OSW3\UX\Trait\EnumTrait;

enum Strategy: string 
{
    use EnumTrait;

    case ALWAYS   = 'always';
    // case MULTIPLE = 'multiple';
    case NONE     = 'none';
}