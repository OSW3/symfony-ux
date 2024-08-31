<?php 
namespace OSW3\UX\Enum\FormWidget;

use OSW3\UX\Trait\EnumTrait;

enum WidgetType: string 
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
    case SELECT   = 'select';
    case TEL      = 'tel';
    case TEXT     = 'text';
    case TEXTAREA = 'textarea';
    case TIME     = 'time';
    case URL      = 'url';
    case WEEK     = 'week';
    
    case MONEY    = 'money';
    case PERCENT  = 'percent';
    case UUID     = 'uuid';
    case BIRTHDAY = 'birthday';
    case INTERVAL = 'interval';
    case DATETIME = 'datetime';
    case ULID     = 'ulid';
    case ENUM     = 'enum';
    case INTEGER  = 'integer';
    case CHOICE   = 'choice';
    case CURRENCY = 'currency';
    case COUNTRY  = 'country';
    case LANGUAGE = 'language';
    case LOCALE   = 'locale';
    case TIMEZONE = 'timezone';
    // case CURRENCY = 'currency';
}