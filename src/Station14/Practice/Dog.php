<?php

namespace Src\Station14\Practice;

class Dog extends Animal
{
    private const VOICE = 'wan';
    public const LEGS = 4;

    public function barking()
    {
        echo self::VOICE;
    }
}
