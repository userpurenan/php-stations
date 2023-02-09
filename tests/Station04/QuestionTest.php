<?php

namespace Tests\Station04;

use PHPUnit\Framework\TestCase;
use Src\Station04\Question;

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
     * @group station04
     */
    public function _1から7までの加算結果を返す(): void
    {
        $result = $this->question->main();

        $this->assertEquals(1+2+3+4+5+6+7, $result);
    }
}
