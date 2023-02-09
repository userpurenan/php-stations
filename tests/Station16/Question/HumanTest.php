<?php

namespace Tests\Station16\Question;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Src\Station16\Question\Car;
use Src\Station16\Question\Human;
use Tests\TypeHintingTestTrait;

/**
 * @group station16
 */
class HumanTest extends TestCase
{
    use TypeHintingTestTrait;

    private const FILE_PATH = __DIR__ . '../../../../src/Station16/Question/Human.php';

    /**
     * @test
     */
    public function nameプロパティを持つ(): void
    {
        $this->assertClassHasAttribute('name', Human::class);
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
    public function constructor_nameプロパティに値を代入する(): void
    {
        $namedHuman = new Human('constructor-test');
        $reflection = new ReflectionClass(Human::class);

        $this->assertSame('constructor-test', $reflection->getProperty('name')->getValue($namedHuman));
    }

    /**
     * @test
     */
    private function constructor_引数nameの型定義がstringである(): void
    {
        $constructor = $this->method(self::FILE_PATH, '__construct');

        $this->assertMethodParamsTypeHinting('string', $constructor);
    }

    /**
     * @test
     */
    public function buyCar_nameと指定Carのnameから文字列を出力する(): void
    {
        $car = new Car('car-name');
        $human = new Human('human-name');

        $this->expectOutputString('human-nameはcar-nameを購入しました');
        $human->buyCar($car);
    }

    /**
     * @test
     */
    public function buyCar_引数carの型定義がCarクラスである(): void
    {
        $buyCar = $this->method(self::FILE_PATH, 'buyCar');

        $this->assertMethodParamsTypeHinting('Car', $buyCar);
    }

    /**
     * @test
     */
    public function buyCar_返り値の型定義がvoidである(): void
    {
        $buyCar = $this->method(self::FILE_PATH, 'buyCar');

        $this->assertMethodReturnValueTypeHinting('void', $buyCar);
    }
}
