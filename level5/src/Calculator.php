<?php

namespace lazyCalculator;

class Calculator
{
    public static function calculate($number1, $number2, callable $callback)
    {
        echo $callback($number1, $number2) . "<br>";
    }
}
