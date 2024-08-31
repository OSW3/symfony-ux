<?php 
namespace OSW3\UX\Enum\SearchBox\History;

use OSW3\UX\Trait\EnumTrait;

enum Order: string 
{
    use EnumTrait;

    case ALPHA = 'alpha';
    case DATE  = 'date';
}