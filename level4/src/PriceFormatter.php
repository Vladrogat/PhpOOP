<?php

namespace Display;

class PriceFormatter implements Formatter
{
    public function format(string $string): string
    {
        return $string . " $";
    }
}
