<?php

namespace Src\Station13\Question;

class Question
{
    public function main(): void
    {
        $car = new Car();
        $car->turnRight();
        $car->backleft();
    }
}
