<?php

namespace EverythingIsInItsPlace;

class Manager
{
    public function place($item)
    {
        if ($item instanceof Papers) {
            echo "Положил " . get_parent_class($item) . " на стол<br>";
        } elseif ($item instanceof Instrument) {
            echo "Положил " . get_parent_class($item) . " внутрь стола<br>";
        } else {
            echo "Выкинул " . ($item instanceof object ? get_class($item) : $item) . " в корзину<br>";
        }
    }
}
