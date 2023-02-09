<?php

namespace Tests\Station15\Question;

use PHPUnit\Framework\TestCase;
use Src\Station15\Question\Question;

/**
 * @group station15
 */
class QuestionTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider_かける数と期待値
     */
    public function _1から3までの数値をN倍した整数の値を出力する(int $multiplier, array $expected): void
    {
        $question = new Question();

        $actual = $question->main([1, 2, 3], $multiplier);
        $this->assertSame($expected, $actual);
    }

    /**
     * 偶数と奇数 1 つずつのみチェック
     */
    public function dataProvider_かける数と期待値(): array
    {
        return [
            'かける数=2' => [
                2,
                [2, 4, 6],
            ],
            'かける数=3' => [
                3,
                [3, 6, 9],
            ],
        ];
    }
}
