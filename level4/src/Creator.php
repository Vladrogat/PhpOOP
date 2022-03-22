<?php

namespace Creator;

class Creator
{
    public static function create(string $name): Item
    {
        $className = __NAMESPACE__ . "\\" .  ucfirst($name);
        if (class_exists($className)) {
            return new $className($name);
        }
        return new EmptyItem($name);
    }
}
