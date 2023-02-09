<?php

namespace Tests\Station12\Question;

use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;
use Src\Station12\Question\Question;

/**
 * @group station12
 */
class QuestionTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        CarbonImmutable::setTestNow(CarbonImmutable::now());
    }

    public function tearDown(): void
    {
        CarbonImmutable::setTestNow();

        parent::tearDown();
    }

    /**
     * @test
     * @dataProvider dataProvider_定価と消費期限の入力に応じた価格
     */
    public function 定価と消費期限の入力に対して価格を返す(
        int $originalPrice,
        \Closure $useByDate,
        int $expected
    ): void
    {
        $actual = (new Question)->main($originalPrice, $useByDate());

        $this->assertEquals($expected, $actual);
    }

    public function dataProvider_定価と消費期限の入力に応じた価格(): array
    {
        return [
            '価格 == 定価' => [
                500,
                fn() => CarbonImmutable::now()->addHours(5),
                500,
            ],
            '価格 == 定価/2' => [
                500,
                fn() => CarbonImmutable::now()->addHours(5)->subSecond(),
                250,
            ],
        ];
    }
}
