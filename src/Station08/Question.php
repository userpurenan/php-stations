<?php

namespace Src\Station08;

class Question
{
    public function main(): array
    {
        $Animal = 
        [
            ['アザラシ','アライグマ'],
            ['ウサギ','ウシ','ウマ'],
            ['オオカミ','オットセイ']
        ];

        array_pop($Animal);
        array_splice($Animal, 1, 0, [['イヌ' ,'イルカ']]);

        return $Animal;
    }
}
