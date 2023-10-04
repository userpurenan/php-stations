<?php

namespace Src\Station09;

class Practice2
{
    public function main(): void
    {
        // $fruits = [
        //     'apple' => 'red',
        //     'banana' => 'yellow',
        //     'rime' => 'green',
        //     'strawberry' => 'red',
        //     'pineapple' => 'yellow',
        // ];
        
        // $result = [];
        
        // foreach ($fruits as $key => $fruit) {
        //     if ($fruit === 'yellow') {
        //         continue;
        //     }
        
        //     $result[$key] = $fruit;
        // }
        
        // print_r($result);

        $users = [
            [
                'id' => 1,
                'last_name' => '山田',
                'first_name' => '太郎',
                'age' => 20,
                'password' => 'yamada',
            ],
            [
                'id' => 2,
                'last_name' => '鈴木',
                'first_name' => '次郎',
                'password' => 'suzuki',
            ],
            [
                'id' => 3,
                'last_name' => '佐藤',
                'first_name' => '花子',
                'password' => 'sato',
            ],
        ];

        $result = [];

        foreach ($users as &$user) {
            array_pop($user);
            if (!isset($user['age'])) 
            {
                $user['age'] = null;
            }
            $user['full_name'] = $user['last_name'] . $user['first_name'];
        }
        print_r($users);
    }
}

(new Practice2())->main();
