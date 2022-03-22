<?php

namespace FactoryCars;
/*
 * создать класс фабрика машин с методом произвожтво машины создающая новую машину с случайно ценой
 * создать класс машина со свойствами название и цена и конструктором
 * 
 * создать фабрику и посчитать сумму произведенных машин количество случайное от 5 до 20
 */
class CarFactory
{
    public function createCar($name)
    {
        return new Car($name, rand(100000, 10000000));
    }
}

class Car
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$nameCars = [
    "Lada",
    "BMW",
    "Nissan",
    "Toyota"
];

$fabric = new CarFactory();
$cars = [];
$sum = 0;
for ($i = 0; $i < rand(5, 20); $i++) {
    $cars[] = $fabric->createCar($nameCars[rand(0, count($nameCars) - 1)]);
}
foreach ($cars as $car) {
    echo "{$car->name} - {$car->price}<br>";
    $sum += $car->price;
}

echo "<br>Итого - {$sum}";
