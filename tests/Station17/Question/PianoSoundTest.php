<?php

namespace Tests\Station17\Question;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Src\Station17\Question\PianoSound;
use Src\Station17\Question\SoundInterface;

/**
 * @group station17
 */
class PianoSoundTest extends TestCase
{
    private PianoSound $pianoSound;

    public function setUp(): void
    {
        parent::setUp();

        $this->pianoSound = new PianoSound();
    }

    /**
     * @test
     */
    public function SoundInterfaceをimplementsしている(): void
    {
        $implements = class_implements($this->pianoSound);

        $this->assertArrayHasKey(SoundInterface::class, $implements);
    }

    /**
     * @test
     */
    public function 文字列ピアノを値に持つ定数INSTRUMENT_NAMEを定義している(): void
    {
        $pianoSound = new ReflectionClass($this->pianoSound);

        $this->assertEquals('ピアノ', $pianoSound->getConstant('INSTRUMENT_NAME'));
    }

    /**
     * @test
     * @dataProvider dataProvider_isValidatedInputに対する入力と期待値
     */
    public function isValidatedInput_ドレミファソラシに該当するか否かを検証する(string|int $input, bool $expected): void
    {
        $actual = $this->pianoSound->isValidatedInput($input);

        $this->assertEquals($expected, $actual);
    }

    public function dataProvider_isValidatedInputに対する入力と期待値(): array
    {
        return [
            '有効: ド' => ['ド', true],
            '有効: レ' => ['レ', true],
            '有効: ミ' => ['ミ', true],
            '有効: ファ' => ['ファ', true],
            '有効: ソ' => ['ソ', true],
            '有効: ラ' => ['ラ', true],
            '有効: シ' => ['シ', true],
            '無効: ドレミファソラシ以外の文字' => ['あ', false],
            '無効: 数字' => ['0', false],
            '無効: 数値' => [1, false],
        ];
    }

    /**
     * @test
     *
     * この問題では sound の引数は isValidatedInput を経由したものに限るため
     * 細かな例外チェックは行わない
     */
    public function sound_楽器名と引数を結合した文字列を返す(): void
    {
        $actual = $this->pianoSound->sound('ド');

        $this->assertEquals($actual, 'ピアノのド');
    }
}
