<?php

namespace Display;

class Display
{
    public static function show($formatter, string $string)
    {
        if ($formatter instanceof Renderable) {
            $formatter->render($string) . "<br>";
        } elseif ($formatter instanceof Formatter || method_exists($formatter, "format")) {
            echo $formatter->format($string) . "<br>"; 
        } else {
            echo $string . "<br>";
        }
    }
}
