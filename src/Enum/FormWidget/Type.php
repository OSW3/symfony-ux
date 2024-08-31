<?php 
namespace OSW3\UX\Enum\FormWidget;

use OSW3\UX\Trait\EnumTrait;

enum Type: string 
{
    use EnumTrait;

    case CHECKBOX = 'checkbox';
    case COLOR    = 'color';
    case DATE     = 'date';
    case EMAIL    = 'email';
    case FILE     = 'file';
    case HIDDEN   = 'hidden';
    case MONTH    = 'month';
    case NUMBER   = 'number';
    case PASSWORD = 'password';
    case RADIO    = 'radio';
    case RANGE    = 'range';
    case SEARCH   = 'search';
    case TEL      = 'tel';
    case TEXT     = 'text';
    case TIME     = 'time';
    case URL      = 'url';
    case WEEK     = 'week';
    case TEXTAREA = 'textarea';
    case SELECT   = 'select';
    case CHOICE   = 'choice';
}