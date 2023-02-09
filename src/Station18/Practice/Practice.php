<?php
namespace Src\Station18\Practice;
class Practice{
public function main(): void{
$test = [
1,2,3,
];
if ($test) {echo 'String';}
echo 'Other';
}
}
(new Practice())->main();
