<?php

namespace Tests\Station12\Question;

use Carbon\CarbonImmutable;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use Src\Station12\Question\Food;

/**
 * @group station12
 */
class FoodTest extends TestCase
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
     */
    public function useByDateプロパティが定義されている(): void
    {
        $food = new ReflectionClass(Food::class);

        try {

            $food->getProperty('useByDate');
            $this->assertTrue(true);

        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * @test
     * @dataProvider dataProvider_食材の定価と消費期限の入力に対する価格
     */
    public function 食材の定価と消費期限の入力に対し現在時点での価格を返す(
        int $originalPrice,
        \Closure $useByDate,
        int $expected
    ): void
    {
        $food = new Food($originalPrice, $useByDate());
        $actual = $food->price();

        $this->assertEquals($expected, $actual);
    }

    public function dataProvider_食材の定価と消費期限の入力に対する価格(): array
    {
        return [
            '定価偶数|消費期限まで5h1s' => [
                500,
                fn() => CarbonImmutable::now()->addHours(5)->addSecond(),
                500,
            ],
            '定価偶数|消費期限まで5h' => [
                500,
                fn() => CarbonImmutable::now()->addHours(5),
                500,
            ],
            '定価偶数|消費期限まで4h59m59s' => [
                500,
                fn() => CarbonImmutable::now()->addHours(5)->subSecond(),
                250,
            ],
            '定価奇数|消費期限まで4h59m59s' => [
                325,
                fn() => CarbonImmutable::now()->addHours(5)->subSecond(),
                162,
            ],
        ];
    }
}
