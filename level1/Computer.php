<?php

namespace Computer;
/*
 * Создать класс класс супер копьютер
 * со свойствами объем памяти, тактовая частота, любимая программа
 * создать конструтор для заполения свойств
 * и метод выполняемой программы, если выполняемая программа является любимой то компьютер должен зависнуть
 * создать 2 супер копьютера выполнить на них по 5 программ чтобы каждый по итогу завис  
 */
class PowerComputer
{
    public $memory;//float
    public $processor_clock_speed;//float
    public $favorite_program;//string

    public function __construct($memory, $processor_clock_speed, $favorite_program)
    {
        $this->memory = $memory;
        $this->processor_clock_speed = $processor_clock_speed;
        $this->favorite_program = $favorite_program;
    }

    public function excuteProgram($program)
    {
        echo "Устройство {$this->memory}Gb и {$this->processor_clock_speed}GHz выполнил програму: '{$program}'";
        if ($program == $this->favorite_program) {
            echo " и завис на долгое время...";
        }
        echo "<br>";
    }
}

$friendPK = new PowerComputer(1024, 3.1, "GTA 5");
$mypk = new PowerComputer(512, 2.3, "Civ 5");

$friendPK->excuteProgram("Visual Studio");
$friendPK->excuteProgram("Calculator");
$friendPK->excuteProgram("MO Word");
$friendPK->excuteProgram("GOG");
$friendPK->excuteProgram("GTA 5");

$mypk->excuteProgram("MS code");
$mypk->excuteProgram("Google");
$mypk->excuteProgram("Блокнот");
$mypk->excuteProgram("Steam");
$mypk->excuteProgram("Civ 5");
