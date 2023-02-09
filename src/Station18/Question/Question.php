<?php

namespace Src\Station18\Question;

class Question
{
private function getArray(): array
{
return array(
"array1", "array2", "array3",
);
}

public function main(): bool
{
$array = $this->getArray();
if (empty($array)) {
return true;
} else {
return false;
}
}
}
(new Question())->main();
