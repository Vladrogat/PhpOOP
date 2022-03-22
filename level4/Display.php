<?php

namespace Display;
//функция автопродгрузки классов по PSR4
spl_autoload_register(function ($class) {

    $prefix = "Display\\";

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
 * Содать интерфейсы Renderable и Formatter
 * Создать классы реализующие эти интерфейсы
 * Создат класс содержащий метод формат
 * Создать класс Display с методом show который получет в параметрах
 * объект класса и строку
 * Если объект реализует интерфейс Renderable до должен вызваться метод render для строки
 * Если объект реализует интерфейс Formatter или содержит метод fomat то необходимо вызвать метод format c параметром полученная строка
 * иначе просто вывести строку
 * создат массив строк и объектов созданных классов и вызвать метод show для всех объектов чтобы все условия были затронуты
 */
$strs = [
    "hello",
    "1200",
    "lada"
];

$objes = [
    new Render(),
    new StringShow(),
    new NameFormatter(),
    new PriceFormatter(),
];

foreach ($strs as $str) {
    foreach ($objes as $obj) {
        Display::show($obj, $str);
    }
    echo PHP_EOL;
}
