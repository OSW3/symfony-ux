<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait FormatTrait
{
    #[ExposeInTemplate(name: 'format', getter: 'fetchFormat')]
    public string|array $format = [];

    #[ExposeInTemplate(name: 'formatInput', getter: 'fetchFormatInput')]
    public string|array $formatInput = [];

    #[ExposeInTemplate(name: 'formatOutput', getter: 'fetchFormatOutput')]
    public string|array $formatOutput = [];

    private function formatResolver(&$resolver): static
    {
        $resolver->setDefault('format', []);
        $resolver->setAllowedTypes('format', ['string','array']);

        $resolver->setDefault('formatInput', []);
        $resolver->setAllowedTypes('formatInput', ['string','array']);

        $resolver->setDefault('formatOutput', []);
        $resolver->setAllowedTypes('formatOutput', ['string','array']);

        return $this;
    }

    public function fetchFormat(): string|array
    {
        return $this->format;
    }

    public function fetchFormatInput(): string|array
    {
        if (empty($this->formatInput)) {
            $this->formatInput = $this->format;
        }

        return $this->formatInput;
    }

    public function fetchFormatOutput(): string|array
    {
        if (empty($this->formatOutput)) {
            $this->formatOutput = $this->format;
        }

        return $this->formatOutput;
    }

    // protected function parseFormat(string|array $input): array 
    // {
    //     $output = $input;

    //     if (!is_array($output)) {

    //         $parts = preg_split('/[ _-]+/', $output);
    //         $output = $parts;
    //     }

    //     if (!empty($output)) {
    //         $output = array_map(function($part) {
    //             if (preg_match("/^d{1,2}$/i", $part)) {
    //                 return "day";
    //             } 
    //             else if (preg_match("/^m{1,2}$/i", $part)) {
    //                 return "month";
    //             } 
    //             else if (preg_match("/^y{1,4}$/i", $part)) {
    //                 return "year";
    //             } 
    //             else {
    //                 return $part;
    //             }
    //         } ,$output);
    //     }

    //     return array_filter($output);
    // }


    public function parseDateFormat(string|array $input): array 
    {
        $output = $input;
        
        if (!is_array($output)) {
            
            $parts = preg_split('/[ _-]+/', $output);
            $output = $parts;
        }

        if (!empty($output)) {

            $output = array_map(function($part) {
                if (preg_match("/^d{1,2}$/i", $part)) {
                    return "day";
                } 
                else if (preg_match("/^m{1,2}$/i", $part)) {
                    return "month";
                } 
                else if (preg_match("/^y{1,4}$/i", $part)) {
                    return "year";
                } 
                else {
                    return $part;
                }
            } ,$output);
        }

        $output = array_filter($output);

        return $output;
    }

    public function parseTimeFormat(string|array $input): array 
    {
        $output = $input;

        if (!is_array($output)) {

            $parts = preg_split('/[ _-]+/', $output);
            $output = $parts;
        }

        if (!empty($output)) {
            $output = array_map(function($part) {
                if (preg_match("/^h{1,2}$/i", $part)) {
                    return "hour";
                } 
                else if (preg_match("/^h{1,2}$/i", $part)) {
                    return "minute";
                } 
                else if (preg_match("/^s{1,2}$/i", $part)) {
                    return "second";
                } 
                else {
                    return $part;
                }
            } ,$output);
        }

        return array_filter($output);
    }
}