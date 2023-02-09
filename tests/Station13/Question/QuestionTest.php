<?php

namespace Tests\Station13\Question;

use PHPUnit\Framework\TestCase;
use Src\Station13\Question\Question;

/**
 * @group station13
 */
class QuestionTest extends TestCase
{
    /**
     * @test
     */
    public function turnRight_backLeftを実行する(): void
    {
        $question = new Question();

        $this->expectOutputString('ブレーキを踏む右にハンドルを回すアクセルを踏むブレーキを踏む左にハンドルを回すハザードランプを点灯するバックする');
        $question->main();
    }
}
