<?php

namespace Src\Station16\Question;

class Car
{
    public string $name = '';

    private int $passenger = 0;

    public function __construct(string $carName)
    {
        $this->name = $carName;
    }

    public function run(): void
    {
        echo '走行する';
    }

    public function pickup(int $number): int
    {
        $result = $this->passenger += $number;
        return $result;
    }


}