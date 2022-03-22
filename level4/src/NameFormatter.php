<?php

namespace Display;

class NameFormatter
{
    public function format(string $string): string
    {
        return strtoupper($string);
    }
}
