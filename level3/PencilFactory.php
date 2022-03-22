<?php

namespace PencilFactory;
/*
 * созадать класс карадаш со свойствами цвет цена и мягкость и с конструктором
 * создать класс Фабрика карандашей в которй содать статичные методы для производства разлиных карадашей (реализовать методы с различным еоличеством входых параметров)  
 * и вывести информацию произведенном карандаше каждого вида
 */
class Pencil
{
    public $color;
    public $price;
    public $softness;

    public function __construct($color, $softness, $price)
    {
        $this->color = $color;
        $this->price = $price;
        $this->softness = $softness;
    }
}

class PencilFactory
{
    public static function createRedTwoHundredRublesPencil($softness)
    {
        return new Pencil('red', $softness, 200);
    }

    public static function createGreenOneHundredRublesPencil($softness)
    {
        return new Pencil('green', $softness, 100);
    }

    public static function createBlackPencil($softness, $price)
    {
        return new Pencil('black', $softness, $price);
    }

    public static function createOneHundredRublesPencil($color, $softness)
    {
        return new Pencil($color, $softness, 100);
    }

    public static function createPencil($color, $softness, $price)
    {
        return new Pencil($color, $softness, $price);
    }

    public static function createWhiteThreeHundredRublesPencil($softness)
    {
        return new Pencil('white', $softness, 300);
    }
}

var_dump(PencilFactory::createRedTwoHundredRublesPencil("b2"));
var_dump(PencilFactory::createGreenOneHundredRublesPencil("b"));
var_dump(PencilFactory::createBlackPencil("h", 140));
var_dump(PencilFactory::createPencil("blue", "h2", 120));
var_dump(PencilFactory::createOneHundredRublesPencil('yellow', 'hb'));
var_dump(PencilFactory::createWhiteThreeHundredRublesPencil('hb'));
