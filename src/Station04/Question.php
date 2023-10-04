<?php

namespace Src\Station04;

class Question
{
    public function main(): int
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $sum =0;

        foreach($array as $arg)
        {
            if($arg === 8 ) break;
            $sum += $arg;
        }
        return $sum;
    }
}
