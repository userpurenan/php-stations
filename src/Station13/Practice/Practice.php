<?php

namespace Src\Station13\Practice;

require_once('vendor/autoload.php');

class Practice
{
    public function main(): void
    {
        $dog = new Dog();
        $dog->active();  // 走る止まるジャンプが出力されます   
    }
}

(new Practice)->main();
