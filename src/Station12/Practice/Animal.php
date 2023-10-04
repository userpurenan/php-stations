<?php

namespace Src\Station12\Practice;

class Animal
{

    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function eat()
    {
        echo '食べる';
    }

    public function sleep()
    {
        echo '寝る';
    }

    public function active()
    {
        echo '活動する';
    }
}
