<?php

namespace Tests\Station17\Question;

use PHPUnit\Framework\TestCase;
use Src\Station17\Question\Question;

/**
 * @group station17
 */
class QuestionTest extends TestCase
{
    /**
     * @test
     */
    public function ピアノとギターの演奏を出力する(): void
    {
        $question = new Question();

        $this->expectOutputString('ピアノのドを鳴らしますエフェクトをかけたギターのCを鳴らします');
        $question->main();
    }
}
