<?php

namespace Src\Station10;

class Question
{
    public function main(string $animal): string
    {
        return $this->getAnimalName($animal);
    }

    private function getAnimalName(string $animal): string
    {
        switch($animal)
        {
            case $animal === '猫':
                return 'ミケ';
                break;
            case $animal === '犬':
                return 'ポチ';
                break;
            default :
                return 'わかりません';
        }
    }
}
