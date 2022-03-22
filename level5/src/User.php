<?php

namespace Validation;

use FFI\Exception;

class User
{
    public function load($id)
    {
        if ($id > 1000) {
            throw new Exception("Пользователь не найден");
        }
    }

    public function save($data)
    {
        return (bool)rand(0, 1);
    }
}
