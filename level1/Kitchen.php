<?php

namespace Kitchen;
/*
 * Начало работы с ООП, создать классы вилка, чашка, и стол.
 * у каждого класса по одному свойству количество зубчиков, объем, цвет соответсвенно
 * создать конструкторы для определения значений свойств
 * создать 3 вилки, 2 чашки с разными значениями свойст, и стол
 */
class Fork
{
    public $numberOfTeeth;

    public function __construct($numberOfTeeth)
    {
        $this->numberOfTeeth = $numberOfTeeth;
    }
}

class Cup
{
    public $volume;

    public function __construct($volume)
    {
        $this->volume = $volume;
    }
}

class Table
{
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }
}

$cup = new Cup(200);
$cup1 = new Cup(500);
$cup2 = new Cup(100);

$fork = new Fork(3);
$fork1 = new Fork(4);

$table = new Table("white");
