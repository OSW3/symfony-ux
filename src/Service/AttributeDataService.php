<?php 
namespace OSW3\UX\Service;

class AttributeDataService 
{
    const INITIAL_VALUE = [];
    private array $dataset = self::INITIAL_VALUE;

    public function add(array $dataset): static
    {
        $this->dataset = array_merge($this->dataset, $dataset);

        return $this;
    }

    public function reset(): static
    {
        $this->dataset = self::INITIAL_VALUE;

        return $this;
    }

    public function getAll(): array
    {
        $dataset = [];

        foreach ($this->dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
        }

        return $dataset;
    }

    public function toAttribute(): string
    {
        $str = "";

        foreach ($this->dataset as $property => $value)
        {
            if (!empty($str)) $str.= " ";
            $str.= "{$property}=\"{$value}\"";
        }

        return $str;
    }
}