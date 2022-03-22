<?php

namespace SecretObject;
/* создать 2 абстрактных класса Секретный объект с абстрактными методами уроветь доступа агента, получение сектерной информации и метода на определение доступа 
 * и агент с абстрактным классом получить доступ и методом на получение секретной информации
 * создать 2 секртных объекта  с "секртной информацией" наследующих абстрактный класс
 * и создать 3 агентов  сдоступом к секртной информации наследующих абстрактный класс
 * 
 * и поробовать получить доступ каждыйм агентом к серетным объектам
 */
abstract class SecretObject
{
    abstract protected function agentLevelHasAccess(int $agentAccessLevel): bool;

    abstract protected function getSecretInformation(): string;

    public function getSecretInformationForAgent(int $agentAccessLevel): string
    {
        if ($this->agentLevelHasAccess($agentAccessLevel)) {
            return $this->getSecretInformation();
        } else {
            return "Доступ запрещен";
        }
    }
}

abstract class Agent
{
    abstract public function getAccessLevel(): int;

    public function getSecretInformation(SecretObject $secretObject): string
    {
        return $secretObject->getSecretInformationForAgent($this->getAccessLevel());
    }
}

class Library extends SecretObject
{
    private string $secretInformation = 'Инопланетяне есть';

    protected function agentLevelHasAccess(int $agentAccessLevel): bool
    {
        if ($agentAccessLevel < 1) {
            return false;
        } else {
            return true;
        }
    }

    protected function getSecretInformation(): string
    {
        return $this->secretInformation;
    }
}

class Area51 extends SecretObject
{
    private string $secretInformation = 'Инопланетян нет';

    protected function agentLevelHasAccess(int $agentAccessLevel): bool
    {
        if ($agentAccessLevel < 6) {
            return false;
        } else {
            return true;
        }
    }

    protected function getSecretInformation(): string
    {
        return $this->secretInformation;
    }
}

class Student extends Agent
{
    public function getAccessLevel(): int
    {
        return 1;
    }
}

class SecretAgent extends Agent
{
    public function getAccessLevel(): int
    {
        return 5;
    }
}

class UnluckySpy extends Agent
{
    public function getAccessLevel(): int
    {
        return rand(0, 6);
    }
}

$student = new Student();
$secretAgent = new SecretAgent();
$unluckySpy = new UnluckySpy();

$library = new Library();
$area51 = new Area51();

echo $student->getSecretInformation($library) . "<br>";
echo $student->getSecretInformation($area51) . "<br><br>";

echo $secretAgent->getSecretInformation($library) . "<br>";
echo $secretAgent->getSecretInformation($area51) . "<br><br>";

echo $unluckySpy->getSecretInformation($library) . "<br>";
echo $unluckySpy->getSecretInformation($area51) . "<br>";
echo "<br><br>";
for ($i = 0; $i < 10; $i++) {
    echo $unluckySpy->getSecretInformation($area51) . "<br>";
}
