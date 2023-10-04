<?php

namespace Src\Station17\Question;


class GuitarSound implements SoundInterface
{
    private const INSTRUMENT_NAME = 'ギター';

    public function isValidatedInput(string $scale): bool
    {
        $timbreList = ['C','D','E','F','G','A','B'];

        foreach($timbreList as $timbre)
        {
            if($scale === $timbre) return true;   
        }
        return false;
    }

    public function sound(string $scale): string
    {
        $explanation = $this->effect($scale);
        return $explanation;
    }

    private function effect(string $scale): string
    {
        $instrumentName = self::INSTRUMENT_NAME;
        return 'エフェクトをかけた'.$instrumentName.'の'.$scale;
    }

}