<?php

namespace Tests\Station15\Question;

use PHPUnit\Framework\TestCase;
use Src\Station15\Question\Calculator;

/**
 * @group station15
 */
class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    public function setUp(): void
    {
        parent::setUp();

        $this->calculator = new Calculator();
    }

    /**
     * @test
     */
    public function かけられる数の配列が空の場合はfalseを返す(): void
    {
        $actual = $this->calculator->multiply([], 1);

        $this->assertEquals(false, $actual);
    }

    /**
     * @test
     * @dataProvider dataProvider_かけられる数かける数の組み合わせとその積
     */
    public function かけられる値を出力する(array $multiplied, int $multiplier, array $expected): void
    {
        $actual = $this->calculator->multiply($multiplied, $multiplier);
        $this->assertSame($expected, $actual);
    }

    public function dataProvider_かけられる数かける数の組み合わせとその積(): array
    {
        return [
            'かけられる数が 1 個' => [
                [1],
                2,
                [2],
            ],
            'かけられる数が 2 個' => [
                [1, 2],
                2,
                [2, 4],
            ],
        ];
    }
}
