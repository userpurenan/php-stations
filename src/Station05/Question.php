<?php

namespace Src\Station05;

class Question
{
    public function main(): int
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $sum =0;

        foreach($array as $arg )
        {
            if($arg/4 >= 2 ) break;
            if($arg === 3 || $arg === 7) continue;
            $sum += $arg;
        }
        
        return $sum;
    }
}
