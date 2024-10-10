<?php 
namespace OSW3\UX\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class UtilsExtensionRuntime implements RuntimeExtensionInterface
{
    private array $options;

    public function __construct(ParameterBagInterface $params)
    {
        $options = $params->all();
        $this->options = $options[Configuration::NAME];
    }
    
    public function getUxClassName(string $_CLASSNAME): string
    {
        $l = [];
        $s = ' ';
        $x = explode($s, $_CLASSNAME);
        $p = $this->options['prefix'];
        $p = !empty($p) ? "{$p}-" : null;

        foreach ($x as $c) {
            $l[] = "{$p}{$c}";
        }
        
        return implode($s, $l);
    }

    public function addAttribute(array $attributes=[], ?string $name=null, mixed $value=null): array
    {
        $attributes[$name] = $value;
        return $attributes;
    }

    public function getAttributes($custom, array $base = []): string 
    {
        $str = "";

        $attr = $custom + $base;

        foreach ($custom as $key => $value) {
            if (array_key_exists($key, $base)) {
                $attr[$key] = $base[$key] . ' ' . $value;
            }
        }

        foreach ($attr as $key => $value)
        {
            $_value = trim($value);

            if (!empty($_value) || $_value === "0")
            {
                $str .= !empty($str) ? " " : null;
                $str .= $value === true ? $key : "{$key}=\"{$_value}\"";
            }
        }

        return $str;
    }
}