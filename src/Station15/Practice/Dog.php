<?php

namespace Src\Station15\Practice;

class Dog
{
    public $name;
    protected $gender;
    private $age;

    function __construct()
    {
        $this->name = "pochi";
        $this->gender = "male";
        $this->age = 5;
    }
}

function main() {

    $i = 100;

    for ($i=0; $i<=3; $i++) {
        echo $i;
    }

    echo $i;

    $animal = new Dog();
    echo $name; // 出力されない
    echo $age; // 出力されない
    echo $animal->name; // 出力される
}

echo $i;
echo $name;

main();
