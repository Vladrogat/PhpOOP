<?php

namespace Import_Export;
/*
 * создать 3 интерфейса Reader(возвращаем массив), Writer(выводи  полученные данные), Converter(конвертирует различным образом строку)
 * создать классы реализующие действие этих интерфесов создать несколько конвертеров
 * Создать класс Импорт, который производит импор и связывает действия классов
 * со свойствами объект Reader, объект Writer, и масисвом различных объектов Converter
 * методом from который в параметрах получет объект Reader и записывает его в калсс возвращая объект
 * метод to в парметрах получет объект Writer и записывает его в калсс возвращая объект
 * метод with в парметрах получет объект Converter и записывает его в массив калсса возвращая объект
 * и метод выполение который производит конвертацию по всем объектам конверторам и выводит получившийся результат
 */
interface Reader
{
    public function read(): array;
}

interface Writer
{
    public function write(array $data);
}

interface Converter
{
    public function convert(string $item): string;
}

class ArrayReader implements Reader
{
    private $data = ["lada", "nissan", "toyota", "hynday"];

    public function read(): array
    {
        return $this->data;
    }
}

class StringWriter implements Writer
{
    public function write(array $data)
    {
        echo implode(", ", $data);
    }
}

class NameConverter implements Converter
{
    public function convert(string $item): string
    {
        return strtoupper($item[0]) . substr($item, 1, strlen($item));
    }
}

class addPriceConverter implements Converter
{
    public function convert(string $item): string
    {
        return $item . " - " . rand(100000, 1000000);
    }
}

class Import
{
    private Reader $reader;
    private Writer $writer;
    private array $converters = [];

    public function from(Reader $reader): Import
    {
        $this->reader = $reader;
        return $this;
    }

    public function to(Writer $writer): Import
    {
        $this->writer = $writer;
        return $this;
    }

    public function with(Converter $converter): Import
    {
        $this->converters[] = $converter;
        return $this;
    }

    public function execute()
    {
        $data = [];
        foreach ($this->reader->read() as $value) {
            foreach ($this->converters as $converter) {
                $value = $converter->convert($value);
            }
            $data[] = $value;
        }
        $this->writer->write($data);
    }
}

(new Import())->from(new ArrayReader())->to(new StringWriter())
->with(new NameConverter())->with(new addPriceConverter())->execute();
