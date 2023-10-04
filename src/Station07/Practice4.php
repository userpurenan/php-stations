<?php

namespace Src\Station07;

class Practice4
{
    public function main(): void
    {
        $array = [
            ['id' => 1, 'name' => '太郎'],
            ['id' => 2, 'name' => '次郎'],
            ['id' => 3, 'name' => '花子']
        ];
        
        $array2 = array_column($array, 'name', 'id');
        print_r($array2);
    }
}

(new Practice4())->main();
