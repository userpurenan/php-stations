<?php

namespace Src\Station13\Question;

class Vehicle
{
    public string $name;

    public int $maxSpeed;

    protected function run() 
    { 
        $this->maxSpeed = 60;
        echo 'アクセルを踏む';
    }
    
    private function stop()
    {
        echo 'ブレーキを踏む';
    }

    private function right()
    {
        echo '右にハンドルを回す';
    }

    private function left()
    {
        echo '左にハンドルを回す'; 
    }

    protected function back()
    {
        echo 'バックする';
    }

    public function turnRight()
    {
        $this->stop();
        $this->right();
        $this->run();
    }

    public function backleft()
    {
        $this->stop();
        $this->left();
        $this->back();
    }

}
