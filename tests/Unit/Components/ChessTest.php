<?php

namespace Tests\Unit\Components;

use App\Components\Chess;
use App\Components\ChessPoint;
use PHPUnit\Framework\TestCase;

class ChessTest extends TestCase
{
    /**
     * @var Chess
     */
    protected $chess;

    public function setUp(): void
    {
        $this->chess = new Chess();
        parent::setUp();
    }

    /**
     * @dataProvider isSameColorProvider()
     *
     * @param $input
     * @param $expected
     */
    public function testIsSameColor($input, $expected)
    {
        $this->assertSame($expected, $this->chess->isSameColor($input[0], $input[1]));
    }

    /**
     * @return array
     */
    public function isSameColorProvider()
    {
        return [
            [[new ChessPoint('a', 1), new ChessPoint('a', 1)], true],
            [[new ChessPoint('a', 1), new ChessPoint('a', 2)], false],
            [[new ChessPoint('b', 2), new ChessPoint('c', 3)], true],
        ];
    }
}
