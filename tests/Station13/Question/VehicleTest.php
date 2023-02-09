<?php

namespace Tests\Station13\Question;

use Error;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use Src\Station13\Question\Vehicle;

/**
 * @group station13
 */
class VehicleTest extends TestCase
{
    private Vehicle $vehicle;

    public function setUp(): void
    {
        parent::setUp();

        $this->vehicle = new Vehicle();
    }

    /**
     * @test
     */
    public function maxSpeedプロパティが定義されている(): void
    {
        $reflection = new ReflectionClass($this->vehicle);

        try {
            $reflection->getProperty('maxSpeed');
            $this->assertTrue(true);
        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * @test
     */
    public function nameプロパティが定義されている(): void
    {
        $reflection = new ReflectionClass($this->vehicle);

        try {
            $reflection->getProperty('name');
            $this->assertTrue(true);
        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * @test
     */
    public function turnRight_3つの文字列を出力する(): void
    {
        $reflection = new ReflectionMethod($this->vehicle, 'turnRight');

        $this->expectOutputString('ブレーキを踏む右にハンドルを回すアクセルを踏む');
        $reflection->invoke($this->vehicle);
    }

    /**
     * @test
     */
    public function backLeft_3つの文字列を出力する(): void
    {
        $reflection = new ReflectionMethod($this->vehicle, 'backLeft');

        $this->expectOutputString('ブレーキを踏む左にハンドルを回すバックする');
        $reflection->invoke($this->vehicle);
    }

    /**
     * @test
     */
    public function run_文字列_アクセルを踏む_を出力する(): void
    {
        $reflection = new ReflectionMethod($this->vehicle, 'run');

        $this->expectOutputString('アクセルを踏む');
        $reflection->invoke($this->vehicle);
    }

    /**
     * @test
     */
    public function stop_文字列_ブレーキを踏む_を出力する(): void
    {
        $reflection = new ReflectionMethod($this->vehicle, 'stop');

        $this->expectOutputString('ブレーキを踏む');
        $reflection->invoke($this->vehicle);
    }

    /**
     * @test
     */
    public function right_文字列_右にハンドルを回す_を出力する(): void
    {
        $reflection = new ReflectionMethod($this->vehicle, 'right');

        $this->expectOutputString('右にハンドルを回す');
        $reflection->invoke($this->vehicle);
    }

    /**
     * @test
     */
    public function left_文字列_左にハンドルを回す_を出力する(): void
    {
        $reflection = new ReflectionMethod($this->vehicle, 'left');

        $this->expectOutputString('左にハンドルを回す');
        $reflection->invoke($this->vehicle);
    }

    /**
     * @test
     */
    public function back_文字列_バックする_を出力する(): void
    {
        $reflection = new ReflectionMethod($this->vehicle, 'back');

        $this->expectOutputString('バックする');
        $reflection->invoke($this->vehicle);
    }

    /**
     * @test
     * @dataProvider dataProvider_privateメソッド群
     */
    public function 他クラスで利用しない各メソッドがprivateになっている(string $method): void
    {
        try {

            $this->vehicle->$method();
            $this->fail($method . ' method must be private function');

        } catch (Error $e) {
            $messages = explode(' ', $e->getMessage());
            $search = ['Call', 'to', 'private', 'method'];

            // 意図せぬエラーの場合は throw
            if (count($search) !== count(array_intersect($search, $messages))) {
                throw $e;
            }

            $this->assertTrue(true);
        }
    }

    public function dataProvider_privateメソッド群(): array
    {
        return [
            ['stop'],
            ['right'],
            ['left'],
        ];
    }
}
