<?php 
namespace OSW3\UX\Enum\Accordion\Item;

use OSW3\UX\Trait\EnumTrait;

enum Properties: string 
{
    use EnumTrait;

    case ID       = 'id';
    case TITLE    = 'title';
    case CONTENT  = 'content';
    case TEMPLATE = 'template';
    case OPEN     = 'open';
}