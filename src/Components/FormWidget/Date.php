<?php 
namespace OSW3\UX\Components\FormWidget;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/bridge.twig')]
class Date extends FormWidget 
{
    public function fetchType(): string 
    {
        return Type::DATE->value;
    }

    public function fetchClass(): string
    {
        return "";
    }

    public function fetchFormat(): string|array
    {
        if (empty($this->format)) {
            $this->format = ['year','month','day'];
        }

        return $this->parseDateFormat($this->format);
    }

    public function fetchFormatInput(): string|array
    {
        $output = $this->format;
        
        if (empty($this->formatInput)) {
            $this->formatInput = $this->format;
        }

        if (!empty($this->formatInput)) {
            $output = $this->parseDateFormat($this->formatInput);
        }

        return $output;
    }

    public function fetchFormatOutput(): string|array
    {
        $output = $this->format;
        
        if (empty($this->formatOutput)) {
            $this->formatOutput = $this->format;
        }

        if (!empty($this->formatOutput)) {
            $output = $this->parseDateFormat($this->formatOutput);
        }

        return $output;
    }
}