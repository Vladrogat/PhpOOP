<?php

namespace Validation;

use FFI\Exception;

class UserFormValidator
{
    public function validate($post): bool
    {
        if (trim($post["name"]) == "") {
            throw new Exception("Имя пустое");
        }
        if ($post["age"] < 18) {
            throw new Exception("Возраст меньше 18!");
        }
        if (!str_contains($post["email"], "@")) {
            throw new Exception("Неверный формат почты");
        }
        return true;
    }
}
