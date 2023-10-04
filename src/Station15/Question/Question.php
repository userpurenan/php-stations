<?php

namespace Src\Station15\Question;

class Question
{
    public function main($multiplieds, $multiplier): array
    {
        $calc = new Calculator();
        $result = $calc->multiply($multiplieds, $multiplier);

        return $result;
    }
}

