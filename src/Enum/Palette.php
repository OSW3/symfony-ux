<?php 
namespace OSW3\UX\Enum;

use OSW3\UX\Trait\EnumTrait;

enum Palette: string 
{
    use EnumTrait;

    case SUCCESS   = 'success';
    case WARNING   = 'warning';
    case DANGER    = 'danger';
    case INFO      = 'info';
    case PRIMARY   = 'primary';
    case SECONDARY = 'secondary';
    case MUTED     = 'muted';
    case LIGHT     = 'light';
    case DARK      = 'dark';
}