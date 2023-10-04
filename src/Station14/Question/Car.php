<?php

namespace Src\Station14\Question;
use Src\Station13\Question\Vehicle;

class Car extends Vehicle
{
    private const DOOR = 5;
    private static $passenger = 0;

    public static function getPassenger()
    {
        echo self::$passenger;
    }

    public function pickup()
    {
        self::$passenger +=  1;
        $this->getPassenger();
    }

    public static function getDoors()
    {
        echo self::DOOR;
    }
}