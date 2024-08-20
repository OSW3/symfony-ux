<?php 
namespace OSW3\UX\Enum\Button;

use OSW3\UX\Trait\EnumTrait;

enum Type: string 
{
    use EnumTrait;

    case BUTTON = 'button';
    case SUBMIT = 'submit';
    case RESET  = 'reset';
    case LINK   = 'link';
}