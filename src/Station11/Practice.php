<?php

namespace Src\Station11;

class Practice
{
    /**
     * 4 人(man:2, woman:2)で 1 組の計 3 チームを作成して出力する
     * - 生徒の人数は 12 人(man:6, woman:6)で固定であり、生徒が余ることはない
     * - 出席番号が連番になっている同性の生徒は別チームに所属する
     */
    public function main($students)
    {
        [$men, $women] = $this->separatedByGender($students);
        $teams = $this->createMixedTeam($men, $women);
        print_r($teams);
    }

    private function separatedByGender($students)
    {
        $men = [];
        $women = [];
        foreach ($students as $student) {
            switch ($student['gender']) {
            case 'man':
                $men[] = $student;
                break;
            case 'woman':
                $women[] = $student;
                break;
            }
        }
        return [$men, $women];
    }

    private function createMixedTeam($men, $women)
    {
        $teams = [[], [], []];
        foreach ($men as $key => $man) {
            $teams[$key%3][] = $man;
        }
        foreach ($women as $key => $woman) {
            $teams[$key%3][] = $woman;
        }

        return $teams;
    }

}

$students = [
    ['id' => 1, 'gender' => 'man'],
    ['id' => 2, 'gender' => 'man'],
    ['id' => 3, 'gender' => 'woman'],
    ['id' => 4, 'gender' => 'man'],
    ['id' => 5, 'gender' => 'woman'],
    ['id' => 6, 'gender' => 'man'],
    ['id' => 7, 'gender' => 'woman'],
    ['id' => 8, 'gender' => 'woman'],
    ['id' => 9, 'gender' => 'woman'],
    ['id' => 10, 'gender' => 'man'],
    ['id' => 11, 'gender' => 'man'],
    ['id' => 12, 'gender' => 'woman'],
];
(new Practice())->main($students);
