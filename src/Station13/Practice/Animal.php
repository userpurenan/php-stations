<?php

namespace Src\Station13\Practice;

class Animal
{
    public function active()
    {
        $this->run();
        $this->stop();
        $this->jump();
    }

    protected function run()
    {
        echo '走る';
    }

    private function stop()
    {
        echo '止まる';
    }

    private function jump()
    {
        echo 'ジャンプ';
    }
}
