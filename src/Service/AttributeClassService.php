<?php 
namespace OSW3\UX\Service;

class AttributeClassService 
{
    const INITIAL_VALUE = [];
    private array $classList = self::INITIAL_VALUE;

    public function add(string $className): static
    {
        $className = explode(" ", $className);

        foreach ($className as $classNameItem)
        {
            if (!in_array($classNameItem, $this->classList))
            {
                array_push($this->classList, $classNameItem);
            }
        }

        return $this;
    }

    public function reset(): static
    {
        $this->classList = self::INITIAL_VALUE;

        return $this;
    }

    public function toString(): string
    {
        return implode(" ", $this->classList);
    }
}