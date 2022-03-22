<?php

namespace Creator;
//функция автопродгрузки классов по PSR4
spl_autoload_register(function ($class) {

    $prefix = "Creator\\";

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
 * Создать класс Создатель который опрделяет есть ли класс в протсранстве имен, если есть то он создает новый объект класса, если нет то создает объект пустого класса
 * Создать класс пустой класс который выводит что класса нет
 * созадть класс Item со свойством имя кострутором и методом show выводящий имя класса
 * создать несколько классов наследующих класс Item
 * создать массив имен классов 
 * ссоздать объект класса создатель и попробовать создать кадждый класс находящийся в массиве
 */
$names = [
    "Cat",
    "Humat",
    "Flow",
    "Car",
    "Ask",
    "get",
    "Rec",
    "Volume",
    "pet",
    "Draw",
];

foreach ($names as $name) {
    $class = Creator::create($name);
    $class->show();
}
