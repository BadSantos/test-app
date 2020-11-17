<?php

namespace Tests\Unit\Components;

use App\Components\Chess;
use App\Components\ChessPoint;
use App\Exceptions\WrongPointCoordinates;
use PHPUnit\Framework\TestCase;

class ChessPointTest extends TestCase
{
    /**
     * @var Chess
     */
    protected $chess;

    /**
     * @dataProvider wrongCoordinatesProvider
     */
    public function testWrongCoordinates(string $x, int $y)
    {
        $this->expectException(WrongPointCoordinates::class);
        new ChessPoint($x, $y);
    }

    /**
     * @dataProvider getColorProvider
     */
    public function testGetColor(string $x, int $y, int $expectedColor)
    {
        $this->assertSame($expectedColor, (new ChessPoint($x, $y))->getColor());
    }

    /**
     * @return array
     */
    public function getColorProvider()
    {
        return [
            ['a', 1, ChessPoint::COLOR_BLACK],
            ['b', 1, ChessPoint::COLOR_WHITE],
        ];
    }

    public function wrongCoordinatesProvider()
    {
        return [
            ['y', 1],
            ['a', 9],
        ];
    }
}
