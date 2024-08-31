<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Components\FormWidget;
use OSW3\UX\Components\FormWidget\Date;
use OSW3\UX\Enum\FormWidget\WidgetType;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/form-widget/bridge.twig')]
// final class Birthday extends FormWidget
class Birthday extends Date
{
    public function fetchType(): string 
    {
        return WidgetType::BIRTHDAY->value;
    }
    
    public function fetchClass(): string
    {
        return "";
    }

    public function fetchYears(): array
    {
        $current = date('Y');
        $start   = $current;
        $end     = $current - 100;

        return $this->formatOption(!empty($this->years) ? $this->years : range($start,$end));
    }

    // public function fetchFormat(): string|array
    // {
    //     if (empty($this->format)) {
    //         $this->format = ['year','month','day'];
    //     }

    //     return $this->parseDateFormat($this->format);
    // }

    // public function fetchFormatInput(): string|array
    // {
    //     $output = $this->format;

    //     if (!empty($this->formatInput)) {
    //         $output = $this->parseDateFormat($this->formatInput);
    //     }

    //     return $output;
    // }

    // public function fetchFormatOutput(): string|array
    // {
    //     $output = $this->format;

    //     if (!empty($this->formatOutput)) {
    //         $output = $this->parseDateFormat($this->formatOutput);
    //     }

    //     return $output;
    // }
}