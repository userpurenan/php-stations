<?php

namespace Src\Station17\Question;

interface SoundInterface
{
    public function isValidatedInput(string $scale): bool; //正しい音色か？

    public function sound(string $scale): string; //楽器と音色の結合
}
