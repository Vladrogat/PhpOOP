<?php

namespace Omnivorous;
/*
 * создать интерфейс съедобность с методами съедобный и вкус
 * создать 5 классов реализующих интерфейс
 * и класс всеядный который будет пробовать объекты данных классов
 * с методом "есть" которы будет в зависимости от съедобности объекта выдавать вкус изи отказываться есть его
 * создать объект всеядный и объекты кадого класса и скормить ему все
 */
interface Edible
{
    public function edible(): bool;

    public function taste(): string;
}

class Piano implements Edible
{
    public function edible(): bool
    {
        return false;
    }

    public function taste(): string
    {
        return "как лакированная древесина";
    }
}

class Flow implements Edible
{
    public function edible(): bool
    {
        return false;
    }

    public function taste(): string
    {
        return "как трава";
    }
}

class Chocolate implements Edible
{
    public function edible(): bool
    {
        return true;
    }

    public function taste(): string
    {
        return "как какао";
    }
}

class Pullover implements Edible
{
    public function edible(): bool
    {
        return false;
    }

    public function taste(): string
    {
        return "как шерсть кота";
    }
}

class Pen implements Edible
{
    public function edible(): bool
    {
        return false;
    }

    public function taste(): string
    {
        return "как чернила с пластиком";
    }
}

class Omnivore
{
    public function eat(Edible $edible)
    {
        if ($edible->edible()) {
            echo "Очень вкусно, я съел:" . get_class($edible) . ". На вкус {$edible->taste()}";
        } else {
            echo "Даже я такое не ем:" . get_class($edible) . ". Фу.";
        }
        echo "<br>";
    }
}

$omnivore = new Omnivore();

$pen = new Pen();
$pullover = new Pullover();
$chocolate = new Chocolate();
$flow = new Flow();
$piano = new Piano();

$omnivore->eat($pen);
$omnivore->eat($pullover);
$omnivore->eat($chocolate);
$omnivore->eat($flow);
$omnivore->eat($piano);
