<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum Orientation: string 
{
    use EnumTrait;

    case HORIZONTAL = 'horizontal';
    case VERTICAL   = 'vertical';
}