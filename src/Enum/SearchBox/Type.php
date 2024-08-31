<?php 
namespace OSW3\UX\Enum\SearchBox;

use OSW3\UX\Trait\EnumTrait;

enum Type: string 
{
    use EnumTrait;

    case BASIC     = 'basic';
    case MODAL     = 'modal';
    case FULL_PAGE = 'full-page';
}