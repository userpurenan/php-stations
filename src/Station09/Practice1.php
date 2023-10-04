<?php

namespace Src\Station09;

class Practice1
{
    public function main(): void
    {
        $array = [1, 2, 3, 4, 5, 6];

        foreach ($array as $value) {
            $array[] = $value;
        }
        
        print_r($array);    
    }
}

(new Practice1())->main();
