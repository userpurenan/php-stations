<?php

namespace Tests\Station16\Question;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use Src\Station16\Question\Car;
use Tests\TypeHintingTestTrait;

/**
 * @group station16
 */
class CarTest extends TestCase
{
    use TypeHintingTestTrait;

    private Car $car;
    private const FILE_PATH = __DIR__ . '../../../../src/Station16/Question/Car.php';

    public function setUp(): void
    {
        parent::setUp();

        $this->car = new Car('test');
    }

    /**
     * @test
     */
    public function nameプロパティを持つ(): void
    {
        $this->assertClassHasAttribute('name', Car::class);
    }

    /**
     * @test
     */
    public function nameプロパティの型定義がstringである(): void
    {
        $name = $this->property(self::FILE_PATH, 'name');

        $this->assertPropertyTypeHinting('string', $name);
    }

    /**
     * @test
     */
    public function 初期値0のpassengerプロパティを持つ(): void
    {
        $reflection = new ReflectionClass($this->car);

        try {
            $this->assertSame(0, $reflection->getProperty('passenger')->getDefaultValue());
        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * @test
     */
    public function passengerプロパティの型定義がintである(): void
    {
        $passenger = $this->property(self::FILE_PATH, 'passenger');

        $this->assertPropertyTypeHinting('int', $passenger);
    }

    /**
     * @test
     */
    public function constructor_nameプロパティに値を代入する(): void
    {
        $namedCar = new Car('constructor-test');
        $reflection = new ReflectionClass(Car::class);

        $this->assertSame('constructor-test', $reflection->getProperty('name')->getValue($namedCar));
    }

    /**
     * @test
     */
    public function constructor_引数nameの型定義がstringである(): void
    {
        $constructor = $this->method(self::FILE_PATH, '__construct');

        $this->assertMethodParamsTypeHinting('string', $constructor);
    }

    /**
     * @test
     */
    public function run_文字列_走行する_を出力する(): void
    {
        $car = new Car('test');

        $this->expectOutputString('走行する');
        $car->run();
    }

    /**
     * @test
     */
    public function run_返り値の型定義がvoidである(): void
    {
        $run = $this->method(self::FILE_PATH, 'run');

        $this->assertMethodReturnValueTypeHinting('void', $run);
    }

    /**
     * @test
     * @dataProvider dataProvider_passengerに加算する値と期待値
     */
    public function pickup_指定された分passengerを加算してその値を返す(int $passengers, int $expected): void
    {
        $car = new Car('test');
        $reflection = new ReflectionClass($car);

        $this->assertSame($expected, $car->pickup($passengers));
        $this->assertSame($expected, $reflection->getProperty('passenger')->getValue($car));
    }

    public function dataProvider_passengerに加算する値と期待値(): array
    {
        return [
            '0加算' => [0, 0],
            '1加算' => [1, 1],
            '2加算' => [2, 2],
        ];
    }

    /**
     * @test
     */
    public function pickup_引数の型定義がintである(): void
    {
        $pickup = $this->method(self::FILE_PATH, 'pickup');

        $this->assertMethodParamsTypeHinting('int', $pickup);
    }

    /**
     * @test
     */
    public function pickup_返り値の型定義がintである(): void
    {
        $pickup = $this->method(self::FILE_PATH, 'pickup');

        $this->assertMethodReturnValueTypeHinting('int', $pickup);
    }
}
