<?php

namespace Creator;

abstract class Item
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function show()
    {
        echo 'Я ' . $this->name . "<br>";
    }
}
