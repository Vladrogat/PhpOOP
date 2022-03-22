<?php

namespace FireofPillow;
/*
 * создать калсс подушка со статичным совйством количество и конструктором который будет считать сколько подуешк мы кинули
 * созать класс окно  со свойством количество подушек иметодом попытка попасть в меня которое с 50% вероятность будет опредлять попала липодушка в окно
 * создать объект окно и кинуть от 10 до 50 подушек в окно
 * и поитогу вывести сколько подушек мы бросили и сколько поапло в окно
 */
class Pillow
{
    public static $count;

    public function __construct()
    {
        static::$count++;
    }
}

class Window
{
    public $pillowsCount;

    public function tryToHitMe(Pillow $pillow)
    {
        if (rand(0, 1)) {
            $this->pillowsCount++;
        }
    }
}

$window = new Window();
for ($i = 0; $i < rand(10, 50); $i++) {
    $window->tryToHitMe(new Pillow());
}
echo "Брошено подушек - " . Pillow::$count . "<br>";

echo "попало подушек - " . $window->pillowsCount;
