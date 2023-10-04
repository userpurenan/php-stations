<?php

namespace Src\Station08;

class Practice
{
    public function main(): void
    {
        // $array = [
        //     [1, 2, 3],
        //     [4, 5, 6],
        //     [7, 8, 9],
        // ];
        
        // array_push($array, [10, 11, 12], [13, 14]);
        // print_r($array);
    
        $Animal = 
        [
            ['アザラシ','アライグマ'],
            ['ウサギ','ウシ','ウマ'],
            ['オオカミ','オットセイ']
        ];

        array_pop($Animal);
        array_splice($Animal, 1, 0, [['イヌ' ,'イルカ']]);

        print_r($Animal);
    }
}

(new Practice())->main();
