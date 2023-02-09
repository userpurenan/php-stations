<?php

namespace Tests\Station03;

use PHPUnit\Framework\TestCase;
use Src\Station03\Question;

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
     * @group station03
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
            [1, 'りんご'],
            [2, 'みかん'],
            [3, 'みかん'],
            [4, 'さくらんぼ'],
            ['1', 'さくらんぼ'],
            ['2', 'さくらんぼ'],
            ['3', 'さくらんぼ'],
            ['test', 'さくらんぼ'],
        ];
    }
}
