<?php

namespace Tests\Station14\Question;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;
use Src\Station14\Question\Car;

/**
 * @group station14
 */
class CarTest extends TestCase
{
    private Car $car;

    public function setUp(): void
    {
        parent::setUp();

        $this->car = new Car();
    }

    /**
     * @test
     */
    public function 初期値5の定数DOORを持つ(): void
    {
        $car = new ReflectionClass($this->car);

        $this->assertSame(5, $car->getConstant('DOOR'));
    }

    /**
     * @test
     */
    public function 初期値0のstaticなpassengerプロパティを持つ(): void
    {
        $car = new ReflectionClass($this->car);

        $this->assertSame(0, $car->getStaticPropertyValue('passenger'));
    }

    /**
     * @test
     */
    public function getPassenger_passengerの数を表示する(): void
    {
        $method = new ReflectionMethod($this->car, 'getPassenger');
        $method->setAccessible(true);

        $this->expectOutputString(0);
        $method->invoke($this->car);
    }

    /**
     * @test
     * @dataProvider dataProvider_pickup実行回数ごとの値
     */
    public function pickup_passengerに1加算した値を表示する(int $expected): void
    {
        $this->expectOutputString($expected);
        $this->car->pickup();
    }

    public function dataProvider_pickup実行回数ごとの値(): array
    {
        return [
            '初回実行' => [1],
            '2回目の実行' => [2],
            '3回目の実行' => [3],
        ];
    }

    /**
     * @test
     */
    public function getDoors_DOORの値を表示する(): void
    {
        $this->expectOutputString(5);
        $this->car->getDoors();
    }
}
