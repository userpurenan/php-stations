<?php

namespace Tests\Station13\Question;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Src\Station13\Question\Car;
use Src\Station13\Question\Vehicle;

/**
 * @group station13
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
    public function Vehicleクラスを継承している(): void
    {
        $parent = get_parent_class($this->car);

        $this->assertEquals(Vehicle::class, $parent);
    }

    /**
     * @test
     */
    public function hazard_文字列_ハザードランプを点灯する_を表示する(): void
    {
        $this->expectOutputString('ハザードランプを点灯する');
        $this->car->hazard();
    }

    /**
     * @test
     */
    public function run_maxSpeedを60に変更して文字列を出力する(): void
    {
        $reflection = new ReflectionClass($this->car);
        $method = $reflection->getMethod('run');

        $this->expectOutputString('アクセルを踏む');

        $method->invoke($this->car);

        $this->assertEquals(60, $reflection->getProperty('maxSpeed')->getValue($this->car));
    }

    /**
     * @test
     */
    public function back_hazardを実行して文字列を出力する(): void
    {
        $reflection = new ReflectionClass($this->car);
        $method = $reflection->getMethod('back');

        $this->expectOutputString('ハザードランプを点灯するバックする');

        $method->invoke($this->car);
    }
}
