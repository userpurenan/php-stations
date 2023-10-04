<?php

namespace Src\Station17\Question;

class PianoSound implements SoundInterface
{
    private const INSTRUMENT_NAME = 'ピアノ';

    public function isValidatedInput(string $scale): bool
    {
        $timbreList = ['ド','レ','ミ','ファ','ソ','ラ','シ','ド'];

        foreach($timbreList as $timbre)
        {
            if($scale === $timbre) return true;   
        }
        return false;
    }
    public function sound(string $scale): string
    {
        $InstrumentName = self::INSTRUMENT_NAME;
        $timbre = $InstrumentName.'の'.$scale;
    
        return $timbre;;    
    }


}