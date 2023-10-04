<?php

namespace Src\Station12\Question;

use Carbon\CarbonImmutable;

class Food extends Product
{
    // property はアクセス修飾子・型定義不問、 __construct での定義でなくとも良い
    public CarbonImmutable $useByDate;

    public function __construct($originalPrice , $useByDate)
    {
        parent::__construct($originalPrice);
        $this->useByDate = $useByDate;
    }


    public function price()
    {
        $now = CarbonImmutable::now();

        if($this->useByDate->diffInHours($now) < 5 ) //消費期限まで、残り5時間を切っていたら
        {
            $harfPrice = intdiv($this->ProductPrice , 2); //半額にする。intdivは、小数点第一も切り捨てられる。
            return $harfPrice; //半額の価格を返す
        } 

        return $this->ProductPrice; //親クラスで定義した元の価格を返す
    }

}
