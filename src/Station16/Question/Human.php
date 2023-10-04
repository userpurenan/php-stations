<?php

namespace Src\Station16\Question;

class Human
{
    private string $name;

    public function __construct(string $humanName)
    {
        $this->name = $humanName;
    }

    public function buyCar(Car $car): void
    {
        echo $this->name.'は'.$car->name.'を購入しました';
    }
}