<?php

namespace App\Traits;

trait EnumToArray
{
    public static function getByKey($key)
    {
        return self::array()[$key];
    }

    public static function array(): array
    {
        $names = array_column(self::cases(), 'name');
        $values = array_column(self::cases(), 'value');

        return array_combine($names, $values);
    }
}
