<?php

namespace Tests\Station16\Question;

use PHPUnit\Framework\TestCase;
use Src\Station16\Question\Question;
use Tests\TypeHintingTestTrait;

/**
 * @group station16
 */
class QuestionTest extends TestCase
{
    use TypeHintingTestTrait;

    private const FILE_PATH = __DIR__ . '../../../../src/Station16/Question/Question.php';

    /**
     * @test
     */
    public function 車を購入して走り乗客を乗せる(): void
    {
        $question = new Question();

        $this->expectOutputString('human-nameはcar-nameを購入しました走行する1');
        $question->main('human-name', 'car-name', 1);
    }

    /**
     * @test
     */
    public function 第1引数の型定義がstringである(): void
    {
        $main = $this->method(self::FILE_PATH, 'main');

        $this->assertMethodParamsTypeHinting('string', $main, 1);
    }

    /**
     * @test
     */
    public function 第2引数の型定義がstringである(): void
    {
        $main = $this->method(self::FILE_PATH, 'main');

        $this->assertMethodParamsTypeHinting('string', $main, 2);
    }

    /**
     * @test
     */
    public function 第3引数の型定義がintである(): void
    {
        $main = $this->method(self::FILE_PATH, 'main');

        $this->assertMethodParamsTypeHinting('int', $main, 3);
    }

    /**
     * @test
     */
    public function 返り値の型定義がvoidである(): void
    {
        $main = $this->method(self::FILE_PATH, 'main');

        $this->assertMethodReturnValueTypeHinting('void', $main);
    }
}
