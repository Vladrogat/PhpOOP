<?php

namespace EverythingIsInItsPlace;
//функция автопродгрузки классов по PSR4
spl_autoload_register(function ($class) {

    $prefix = "EverythingIsInItsPlace\\";

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
 * абстрактные классы инструмент и бумаги
 * создать классы наследующие эти классы 
 * и создать класс менеджер который в зависимости от типа объекта выполняет определенное дейтствие
 * метод place выполняет дествие положить на стол если это объект от класса инструмент
 * положить в стол если объет от лкасса бумаги
 * и выкинуть елси иное
 */
abstract class Instrument
{

}

abstract class Papers
{

}

$manager = new Manager();
$manager->place(new Paper());
$manager->place("ручка");
$manager->place(new Hammer());
$manager->place(implode(' ', [4, 5, 8]));
$manager->place(5);
