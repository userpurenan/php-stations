<?php

namespace Tests\Station17\Question;

use Error;
use PHPUnit\Framework\TestCase;
use Src\Station17\Question\GuitarSound;
use Src\Station17\Question\Keyboard;
use Src\Station17\Question\PianoSound;
use Src\Station17\Question\SoundInterface;

/**
 * @group station17
 */
class KeyboardTest extends TestCase
{
    private Keyboard $keyboard;

    public function setUp(): void
    {
        parent::setUp();

        $this->keyboard = new Keyboard();
    }

    /**
     * @test
     */
    public function 第1引数の型がSoundInterfaceである(): void
    {
        $class = new class implements SoundInterface {

            public function isValidatedInput(string $scale): bool
            {
                return true;
            }

            public function sound(string $scale): string
            {
                return '';
            }
        };

        try {
            $this->keyboard->play($class, 'ド');
            $this->assertTrue(true);
        } catch (Error $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * @test
     * @dataProvider dataProvider_対象楽器音と有効な音名
     */
    public function 有効な音名の場合_文字列_指定楽器音を鳴らす_を出力する(
        SoundInterface $sound,
        string $scale,
        string $expected
    ): void {
        $this->expectOutputString($expected);
        $this->keyboard->play($sound, $scale);
    }

    public function dataProvider_対象楽器音と有効な音名(): array
    {
        return [
            'ピアノ' => [new PianoSound(), 'ド', 'ピアノのドを鳴らします'],
            'ギター' => [new GuitarSound(), 'C', 'エフェクトをかけたギターのCを鳴らします'],
        ];
    }

    /**
     * @test
     * @dataProvider dataProvider_無効な音名について各楽器音を検証
     */
    public function 無効な音名の場合_一律に規定文字列を出力(SoundInterface $sound): void
    {
        $this->expectOutputString('この音を鳴らすことはできません');
        $this->keyboard->play($sound, '無効な音名');
    }

    public function dataProvider_無効な音名について各楽器音を検証(): array
    {
        return [
            'ピアノ' => [new PianoSound()],
            'ギター' => [new GuitarSound()],
        ];
    }
}
