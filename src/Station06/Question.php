<?php

namespace Src\Station06;

class Question
{
    public function main(): array
    {
        $array = ['red', 'blue', 'yellow'];
        
        array_splice($array, 1, 0, 'green' );
        array_unshift($array, 'white', 'black');
        array_pop($array);
        return $array;
    }
}
