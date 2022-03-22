<?php

namespace Display;

class Render implements Renderable
{
    public function render($string)
    {
        echo "Отрендерил {$string}<br>";
    }
}
