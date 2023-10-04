<?php

namespace Src\Station07;

class Practice1
{
    public function main(): void
    {
        $array1 = [1, 2, 3];
        $array2 = [4, 5];
        
        $mergedArray = array_merge($array1, $array2);
        print_r($mergedArray);
    }
}

(new Practice1())->main();
