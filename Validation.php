<?php

class Validation
{
    /**
     * Validates a specific string
     *
     * @param string $string
     * @param integer $min
     * @param integer $max
     * @return boolean
     */
    public static function string(string $string, int $min = 0, int $max = 99999): bool
    {
        return strlen($string) >= $min && strlen($string) <= $max;
    }

    /**
     * Confirmes if two values matches
     *
     * @param [type] $value1
     * @param [type] $value2
     * @return boolean
     */
    public static function confirmPassword($value1, $value2): bool
    {
        return $value1 === $value2;
    }
}
