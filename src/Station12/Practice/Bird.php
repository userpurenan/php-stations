<?php

namespace Src\Station12\Practice;

// ここにクラスを定義
class Bird extends Animal
{
    // public $type = 'pegion';

    // public function fly()
    // {
    //     echo '飛ぶ';
    // }

    // public function __construct($type)
    // {
    //     $this->type = $type;
    // }

    public function __construct($type)
    {
        parent::__construct($type);
    }
}
