<?php

namespace Tests\Station09;

use PHPUnit\Framework\TestCase;
use Src\Station09\Question;

class QuestionTest extends TestCase
{
    private Question $question;

    public function setUp(): void
    {
        parent::setUp();

        $this->question = new Question();
    }

    /**
     * @test
     * @group station09
     */
    public function ageとfull_name要素の追加_password要素を削除した連想配列を返す(): void
    {
        $actual = $this->question->main();

        $this->assertEquals([
            [
                'id' => 1,
                'last_name' => '山田',
                'first_name' => '太郎',
                'full_name' => '山田太郎',
                'age' => 20,
            ],
            [
                'id' => 2,
                'last_name' => '鈴木',
                'first_name' => '次郎',
                'full_name' => '鈴木次郎',
                'age' => null,
            ],
            [
                'id' => 3,
                'last_name' => '佐藤',
                'first_name' => '花子',
                'full_name' => '佐藤花子',
                'age' => null,
            ],
        ], $actual);
    }
}
