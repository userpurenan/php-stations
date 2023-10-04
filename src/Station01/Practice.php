<?php

namespace Src\Station01;

use SebastianBergmann\Type\TrueType;

class Practice
{
    public function main(): void
    {
        $a = TRUE;
        echo gettype($a) . PHP_EOL;
    }
}

(new Practice())->main();
