<?php

namespace Validation;

use FFI\Exception;

//функция автопродгрузки классов по PSR4
spl_autoload_register(function ($class) {

    $prefix = "Validation\\";

    $base_dir = __DIR__ . "/src/";

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace("\\", "/", $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
/*
 * Создать классы для реализации валидации
 * Создать класс UserFromValidetor c методом validate с валидацией полей
 * в случае не удовлетворния валидации вызывать исключения с соответсвующим сообщением
 * и создать класс User
 * с методами load для проверки соответсвия id(условия придумать самому)
 * и методом save для имитации загрузки бд с вероятностью 50%
 */
$success = false;
//если отправлен post запрос
if (!empty($_POST)) {
    try {
        $user = new User();
        $user->load($_POST["id"]);
        
        $success = (new UserFormValidator())->validate($_POST);

        if (!$user->save($_POST)) {
            throw new Exception("Неудалось сохранить пользователя");
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Валидация</title>
</head>
<body>
    <div style="margin: 10px;">
        <?php
        if ($success) {
            ?>
        <div style="background-color: green; width: auto;">
            <p>Успешно изменено</p>
        </div>
            <?php
        } elseif (isset($error)) {?>
        <div style="background-color: red;">
            <p><?=$error?></p>
        </div>
            <?php
        }
        ?>
        <form action="#" method="post">
            <label for="id">id</label>
            <input type="number" name="id" id="id" min="1">  
            <br>
            <label for="name">Имя</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="age">Возраст</label>
            <input type="number" name="age" id="age" min = "0" max="100" >
            <br>
            <label for="email">e-mail</label>
            <input type="text" name="email" id="email">
            <br>
            <input type="submit" value="Отправить">
        </form>        
    </div>
</body>
</html>
