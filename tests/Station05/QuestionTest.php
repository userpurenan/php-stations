<?php

namespace Tests\Station05;

use PHPUnit\Framework\TestCase;
use Src\Station05\Question;

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
     * @group station05
     */
    public function _1から9のうち3と7以上の値を除く数値の加算結果を返す(): void
    {
        $result = $this->question->main();

        $this->assertEquals(1+2+4+5+6, $result);
    }
}
