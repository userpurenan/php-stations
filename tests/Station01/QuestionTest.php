<?php

namespace Tests\Station01;

use PHPUnit\Framework\TestCase;
use Src\Station01\Question;

class QuestionTest extends TestCase
{
    private Question $question;

    public function setUp(): void
    {
        parent::setUp();

        $this->question = new Question();
    }

    /**
     * @test
     * @group station01
     */
    public function 返り値の型がint型とbool型である(): void
    {
        $result = $this->question->main();

        $this->assertSame('integer', gettype($result[0]));
        $this->assertSame('boolean', gettype($result[1]));
    }
}
