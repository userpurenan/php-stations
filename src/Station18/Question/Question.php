<?php

namespace Src\Station18\Question;

class Question
{
    public function main(): bool
    {
        $array = $this->getArray();
        if (empty($array)) {
            return true;
        }
        return false;
    }
    private function getArray(): array
    {
        return [
            "array1", "array2", "array3",
            ];
    }
}
(new Question())->main();
