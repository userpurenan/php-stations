<?php

namespace Src\Station12\Question;

class Product
{
    public int $ProductPrice;
    // property はアクセス修飾子・型定義不問、__construct での定義でなくとも良い
    public function __construct(int $originalPrice)
    {
        $this->ProductPrice = $originalPrice;
    }
}
