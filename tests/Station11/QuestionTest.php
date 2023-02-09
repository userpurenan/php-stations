<?php

namespace Tests\Station11;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use Src\Station11\Question;

/**
 * @group station11
 */
class QuestionTest extends TestCase
{
    private Question $question;
    private array $lessThanBudgetSweets;
    private array $sweets;

    public function setUp(): void
    {
        parent::setUp();

        $this->question = new Question();

        $this->lessThanBudgetSweets = [
            ['name' => '飴玉', 'price' => 50],
            ['name' => '綿菓子', 'price' => 60],
            ['name' => 'ポテトチップス', 'price' => 160],
            ['name' => 'チョコレート', 'price' => 80],
            ['name' => 'ドーナツ', 'price' => 120],
            ['name' => 'キャラメル', 'price' => 180],
            ['name' => 'ラムネ', 'price' => 90],
            ['name' => 'クッキー缶', 'price' => 299],
        ];

        $this->sweets = array_merge($this->lessThanBudgetSweets, [
            ['name' => 'ケーキ', 'price' => 300],
        ]);
    }

    /**
     * @test
     */
    public function _300円の予算内で3つのお菓子データを抽出する(): void
    {
        $actual = $this->question->main($this->sweets);
        $totalPrice = array_sum(array_column($actual, 'price'));

        $this->assertCount(3, $actual);
        $this->assertLessThanOrEqual(300, $totalPrice);
    }

    /**
     * @test
     */
    public function お菓子データの抽出はランダムである(): void
    {
        $result1 = $this->question->main($this->sweets);

        $actual = [
            $this->question->main($this->sweets),
            $this->question->main($this->sweets),
            $this->question->main($this->sweets),
        ];
        $expected = [$result1, $result1, $result1];

        $this->assertNotEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function getSweetsLessThanBudgetでの処理が命名に合致する(): void
    {
        $method = new ReflectionMethod($this->question, 'getSweetsLessThanBudget');
        $method->setAccessible(true);

        $actual = $method->invoke($this->question, $this->sweets, 300);

        // 戻り値の配列内要素の順序は不問のため sort を画一化
        $expected = array_multisort(
            array_column($this->lessThanBudgetSweets, 'name'),
            SORT_ASC,
            $this->lessThanBudgetSweets
        );
        $sortedActual = array_multisort(array_column($actual, 'name'), SORT_ASC, $actual);

        $this->assertSame($expected, $sortedActual);
    }

    /**
     * @test
     */
    public function getRandomKeysでの処理が命名に合致する(): void
    {
        $method = new ReflectionMethod($this->question, 'getRandomKeys');
        $method->setAccessible(true);

        $sweets = [
            ['name' => '返り値に含まれる1', 'price' => 50],
            ['name' => '返り値に含まれる2', 'price' => 60],
            ['name' => '加算で予算上限超過のため返り値に含まれない', 'price' => 191],
            ['name' => '返り値に含まれる3', 'price' => 160],
        ];
        $actual = $method->invoke($this->question, $sweets, 300);

        $this->assertSame([0, 1, 3], $actual);
    }

    /**
     * @test
     */
    public function makeCombinationでの処理が命名に合致する(): void
    {
        $method = new ReflectionMethod($this->question, 'makeCombination');
        $method->setAccessible(true);

        $actual = $method->invoke($this->question, $this->lessThanBudgetSweets, [0, 2, 4]);

        $this->assertSame(
            [
                $this->lessThanBudgetSweets[0],
                $this->lessThanBudgetSweets[2],
                $this->lessThanBudgetSweets[4],
            ],
            $actual
        );
    }
}
