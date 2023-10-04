<?php

namespace Src\Station14\Question;

class Question
{
    public function main(): void
    {
        $car = new Car();
        $car->pickup();
        $car->getDoors();
    }
}
