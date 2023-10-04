<?php

namespace Src\Station06;

class Practice2
{
    public function main(): void
    {
        $array = [1, 2, 3];

        array_push($array, 5, 6);
        print_r($array);
        array_unshift($array, -1, 0);
        print_r($array);
        array_splice($array, 5, 0, 4);
        print_r($array);    
    }
}

(new Practice2())->main();
