<?php

namespace lazyCalculator;

class Calculation
{
    public static function Multiplication($num1, $num2)
    {
        return $num1 * $num2;
    }

    public function Division($num1, $num2)
    {
        if ($num2 == 0) {
            return 0;
        }
        return $num1 / $num2;
    }
}
