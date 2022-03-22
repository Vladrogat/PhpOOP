<?php

namespace InternetStore;
/*
 * Создать классы товар, позиция корзины, корзина товартов, и заказ
 * 
 * у класса товар свойства имя и цена, конструтор, и методы гетеры для получения значений свойств
 * 
 * у класса позиция корзины свойство объект товар, и количество, коструктор, гетеры полей, и гетер возвращающий стоимость позиции
 * 
 * у класса корзина товартов свойство массив содержимое, метод добавить товар добавляющий объект товар в количестве в массив позиций корзины
 * метод гетер возвращающий стоимость всех позиций, и метод описание корзины
 * 
 * у калсса заказ свойство объект класса козина товаров, конструктор, гетер возвращающий цену корзины + 300(цена дростваки), гетер возращвющий корзину данного заказа
 * 
 * СОздать козину добавить в нее несколько товаров, оформитт заказ на эту корзину, и вывести информацию корзины
 */
class Product
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class BasketPosition
{
    public Product $product;
    public $count;

    public function __construct($product, $count)
    {
        $this->product = $product;
        $this->count = $count;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getPrice(): int
    {
        return  $this->product->getPrice() *  $this->count;
    }
}

class Basket
{
    public $composition = [];

    public function addProduct(Product $product, $quantity)
    {
        $this->composition[] = new BasketPosition($product, $quantity);
    }

    public function getPrice(): int
    {
        $sum = 0;
        foreach ($this->composition as $position) {
            $sum += $position->getPrice();
        }
        return $sum;
    }

    public function describe()
    {
        foreach ($this->composition as $position) {
            echo "<br>{$position->getProduct()->getName()} - {$position->getProduct()->getPrice()} - {$position->getCount()}<br>";
        }
    }
}

class Order
{
    public Basket $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function getPrice(): int
    {

        return $this->basket->getPrice() + 300;
    }

    public function getBasket(): Basket
    {
        return $this->basket;
    }
}

$basket = new Basket();

$basket->addProduct(new Product("Honor Magicbook 14", 70000), 2);
$basket->addProduct(new Product("Модем", 3000), 1);
$basket->addProduct(new Product("беспроводная мышка", 3000), 1);
$order = new Order($basket);

echo "<br>Создан заказ, на общую сумму: {$order->getPrice()}.
<br>Состав заказа:<br>";
$order->getBasket()->describe();
