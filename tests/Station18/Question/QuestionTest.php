<?php

namespace Tests\Station18\Question;

use PhpParser\Node\Expr\Array_;
use PHPUnit\Framework\TestCase;
use Tests\TypeHintingTestTrait;

/**
 * @group station18
 */
class QuestionTest extends TestCase
{
    use TypeHintingTestTrait;

    private const FILE_PATH = __DIR__ . '../../../../src/Station18/Question/Question.php';

    /**
     * @test
     */
    public function getArray関数内の配列の宣言がshortである(): void
    {
        $getArray = $this->method(self::FILE_PATH, 'getArray');

        $this->assertEquals($getArray->getStmts()[0]->expr->getAttributes()['kind'], Array_::KIND_SHORT);
    }

    /**
     * @test
     */
    public function 関数の順序が正しくならんでいる(): void
    {
        $getArray = $this->method(self::FILE_PATH, 'getArray');
        $main = $this->method(self::FILE_PATH, 'main');

        $getArrayStartLine = $getArray->getAttributes()['startLine'];
        $mainStartLine = $main->getAttributes()['startLine'];

        $this->assertLessThan($getArrayStartLine, $mainStartLine);
    }

    /**
     * @test
     */
    public function elseが使用されていないこと(): void
    {
        $main = $this->method(self::FILE_PATH, 'main');

        $this->assertNull($main->getStmts()[1]->else);
    }

    /**
     * @test
     */
    public function php_cs_fixerの結果確認(): void
    {
        $cmd = './vendor/bin/php-cs-fixer fix --dry-run ./src/Station18/Question/Question.php --config=./src/Station18/Question/.php-cs-fixer.php';
        exec($cmd, $result);

        $this->assertTrue(str_starts_with($result[1], 'Found 0 of 1 files that can be fixed'));
    }
}
