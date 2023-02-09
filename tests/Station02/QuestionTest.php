<?php

namespace Tests\Station02;

use PHPUnit\Framework\TestCase;
use Src\Station02\Question;

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
     * @group station02
     * @dataProvider dataProvider_引数に応じた文字列
     */
    public function 引数に応じた文字列を返す(mixed $arg, string $expected): void
    {
        $result = $this->question->main($arg);

        $this->assertSame($expected, $result);
    }

    public function dataProvider_引数に応じた文字列(): array
    {
        return [
            [0, 'zero'],
            ['1', 'foo'],
            [1, 'bar'],
            [2, 'baz'],
            [3, 'baz'],
            ['2', 'baz'],
            ['0', 'others'],
            [null, 'others'],
            [false, 'others'],
        ];
    }
}
