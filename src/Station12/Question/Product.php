<?php

namespace Src\Station12\Question;

class Product
{
    // property はアクセス修飾子・型定義不問、__construct での定義でなくとも良い
    public function __construct(protected readonly int $originalPrice)
    {
    }
}
