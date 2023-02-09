<?php

namespace Tests\Station14\Question;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Src\Station14\Question\Car;
use Src\Station14\Question\Question;

/**
 * @group station14
 */
class QuestionTest extends TestCase
{
    /**
     * @test
     */
    public function turnRight_backLeftを実行する(): void
    {
        $question = new Question();
        $passenger = (new ReflectionClass(Car::class))->getStaticPropertyValue('passenger');

        $expected = ++$passenger . '5';

        $this->expectOutputString($expected);
        $question->main();
    }
}
