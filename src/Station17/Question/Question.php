<?php

namespace Src\Station17\Question;

class Question
{
    public function main(): void
    {
        $keybord = new Keyboard();
        $Piano = new PianoSound();
        $Guitar = new GuitarSound();

        $keybord->play( $Piano ,'ド' );
        $keybord->play( $Guitar , 'C' );
    }
}
