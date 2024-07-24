<?php 
namespace OSW3\UX\Trait;

trait EnumTrait
{
    /**
     * Undocumented function
     *
     * @param string $case
     * @param string $default
     * @return void
     */
    public static function fromDefault(string $case, string $default = 'default')
    {
        if ($try = self::tryFrom($case))
        {
            return $try;
        }
        return self::tryFrom($default);
    }

    /**
     * 
     */
    public static function toString(string $separator=',', string $start='', string $end=''): string
    {
        $cases = self::cases();
        $map = array_map(fn($case) => $case->name, $cases);
        return $start . implode($separator, $map) . $end;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public static function toArray(): array 
    {
        $output = [];
        $genders = self::cases();

        array_walk($genders, function($gender) use (&$output) {
            $output[$gender->name] = $gender->value;
        });

        return $output;
    }
}