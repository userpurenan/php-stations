<?php

namespace Tests\Station08;

use PHPUnit\Framework\TestCase;
use Src\Station08\Question;

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
     * @group station08
     */
    public function 整形した二次元配列を返す(): void
    {
        $actual = $this->question->main();

        $this->assertSame([
            ['アザラシ', 'アライグマ'],
            ['イヌ', 'イルカ'],
            ['ウサギ', 'ウシ', 'ウマ'],
        ], $actual);
    }
}
