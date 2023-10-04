<?php

namespace Src\Station17\Question;

class Keyboard
{
    public function play(SoundInterface $soundInterface , string $scale): void
    {
        $Sound = $soundInterface->isValidatedInput($scale);
        $timbreSound = $soundInterface->sound($scale);

        if($Sound === false)
        {
            echo 'この音を鳴らすことはできません';
        }
        else
        {
            echo $timbreSound.'を鳴らします';
        }
    }
}