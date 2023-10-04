<?php

namespace Src\Station06;

class Practice3
{
    public function main(): void
    {
        $array = [1, 2, 3, 4, 5];

        array_pop($array);
        print_r($array);
        array_shift($array);
        print_r($array);
        array_splice($array, 0, 2, [6,7]);
        print_r($array);
    }
}

(new Practice3())->main();
