<?php

namespace Src\Station15\Question;

class Calculator
{
    public function multiply($multiplieds,$multiplier)
    {
        if(empty($multiplieds))
        {
            return false;
        }
        else
        {
            $result = array_map(function($multi) use ($multiplier){
                return $multi * $multiplier;
            }, $multiplieds);

            return $result;
        }
    }
}

