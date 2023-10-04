<?php

namespace Src\Station11;

class Question
{
    public function main(array $sweets): array
    {
        $budget = 300;
        
        $withInBudget = $this->getSweetsLessThanBudget($sweets,$budget);
        $keys = $this->getRandomKeys($withInBudget, $budget);
        $selectedSweets = $this->makeCombination($withInBudget, $keys);

        return $selectedSweets;

    }

    private function getSweetsLessThanBudget(array $sweets, int $budget)
    {
        //３００円($budget)より大きいお菓子を排除
        $sweets = array_filter($sweets, function ($array) use ($budget){
            return $array['price'] <= $budget;
        });

        return $sweets;

    }

    private function getRandomKeys(array $lessThanBudgetSweets, int $budget)
    {
        while(true)
        {
            $value = [];
            $sum = 0;
            $keys = array_rand($lessThanBudgetSweets,3); //ランダムなキーを３つ取得

            foreach($keys as $key)
            {
                $value[] = $lessThanBudgetSweets[$key]; //取得したランダムなキーに対応するお菓子を格納
                $sum += $lessThanBudgetSweets[$key]['price']; //３つのお菓子の合計金額
            }

            if ($sum > 300) // 単価が300円を超えた場合は、別のランダムなキーを取得し直す
            {
                $keys = array_rand($lessThanBudgetSweets,3); //ランダムなキーを３つ取得
            }
            else //300円未満だったらキーを返す
            {
                return $keys;
            }
        }
    }

    private function makeCombination(array $sweets, array $keys)
    {
        $value = []; // お菓子を格納する配列
    
        foreach($keys as $key)
        {
            $value[] = $sweets[$key]; //取得したランダムなキーに対応するお菓子を格納
        }    
        return $value;
    }
}