<?php

namespace Src\Station02;

class Question
{
    public function main(mixed $arg): string
    {
        if($arg === 0)
        {
            return 'zero';
        }
        else if($arg === '1')
        {
            return 'foo';
        }
        else if($arg === 1)
        {
            return 'bar';
        }
        else if($arg >= 2)
        {
            return 'baz';
        }
        else
        {
            return 'others';
        }
    }
}
