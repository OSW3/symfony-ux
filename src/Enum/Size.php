<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum Size: string 
{
    use EnumTrait;

    case SMALL  = 'small';
    case NORMAL = 'normal';
    case MEDIUM = 'medium';
    case LARGE  = 'large';
}