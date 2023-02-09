<?php

namespace Src\Station13\Practice;

class Animal
{
    public function eat()
    {
        echo '食べる';
    }

    protected function sleep()
    {
        echo '寝る';
    }

    private function active()
    {
        echo '活動する';
    }
}
