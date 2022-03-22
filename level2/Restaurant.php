<?php

namespace Restaurant;

/*
 * Создать абстрактный класс блюдо со свойствами название и цена, конструктор, и абстрактные методы гетеры имени и цены
 * 
 * реализовать несколько блюд наследуя этот абстрактный класс
 * 
 * Создать класс повар со свойством заказ(массив блюд)
 * методом добавления блюда в заказ
 * методом приготовления блюд
 * и методом выводящим стоимость заказа
 * 
 * Создать класс шеф повар выполяющий те же дейсвия что и повар но цена за заказ в 5 раз больше
 * 
 * Создать обхект повара и шефа и создать заказ на приготовление созданных классов блюд 
 */
abstract class Dish
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function getName(): string;

    abstract public function getPrice(): int;
}

class CaesarSalad extends Dish
{
    public function __construct()
    {
        parent::__construct("Салат цезарь", 300);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class Foiegras extends Dish
{
    public function __construct()
    {
        parent::__construct("Фуагра", 260);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class Borsch extends Dish
{
    public function __construct()
    {
        parent::__construct("Борщь", 180);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class Cook
{
    private $order = [];

    public function addDishOrder(Dish $dish)
    {
        $this->order[] = $dish;
    }

    public function prepareFood()
    {
        foreach ($this->order as $dish) {
            echo "Повар приготовил: {$dish->getName()}<br>";
        }
        echo "Стоимость заказа: " . $this->getSumOrder() . "<br>";
    }

    protected function getSumOrder()
    {
        $sum = 0;
        foreach ($this->order as $dish) {
            $sum += $dish->getPrice();
        }
        return $sum;
    }
}

class Chef extends Cook
{
    protected function getSumOrder()
    {
        return parent::getSumOrder() * 5;
    }
}

$salad = new CaesarSalad();
$foiegras = new Foiegras();
$borsch = new Borsch();

$cook = new Cook();

$cook->addDishOrder($salad);
$cook->addDishOrder($foiegras);
$cook->addDishOrder($borsch);

$cook->prepareFood();

$chef = new Chef();

$chef->addDishOrder($salad);
$chef->addDishOrder($foiegras);
$chef->addDishOrder($borsch);

$chef->prepareFood();
