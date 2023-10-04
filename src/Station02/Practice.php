<?php

namespace Src\Station02;

class Practice
{
    public function main(): void
    {
        $arg = false;

        if($arg === 0)
        {
            echo 'zero';
        }
        else if($arg === '1')
        {
            echo 'foo';
        }
        else if($arg === 1)
        {
            echo 'bar';
        }
        else if($arg >= 2)
        {
            echo 'baz';
        }
        else
        {
            echo 'others';
        }
        
        echo PHP_EOL;    }
}

(new Practice())->main();
