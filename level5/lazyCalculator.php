<?php

namespace lazyCalculator;
//функция автопродгрузки классов по PSR4
spl_autoload_register(function ($class) {

    $prefix = "lazyCalculator\\";

    $base_dir = __DIR__ . "/src/";

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace("\\", "/", $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
/*
 * создать класс калькулятор котрый выполняет простые арифметические действия
 * с двумя переданными числами, выполнить каждое дествие разными callable функциями
 */
function subtraction($num1 = 0, $num2 = 0)
{
    return $num1 - $num2;
}

$callbacks = [

    function ($num1, $num2) {
        return $num1 + $num2;
    },
    [Calculation::class, "Multiplication"],
    [new Calculation(), "Division"],
    "subtraction",
];

$num1 = 4;
$num2 = 10;

foreach ($callbacks as $callback) {
    Calculator::calculate($num1, $num2, $callback);
}
