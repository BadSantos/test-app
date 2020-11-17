<?php

namespace App\Components;

use App\Exceptions\WrongPointCoordinates;

/**
 * Class ChessPoint.
 */
class ChessPoint
{
    const COLOR_BLACK = 0;
    const COLOR_WHITE = 1;

    /**
     * @var array
     */
    public $map = [
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 4,
        'e' => 5,
        'f' => 6,
        'g' => 7,
        'h' => 8,
    ];

    /**
     * @var string
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    /**
     * ChessPoint constructor.
     *
     * @param string $x letter coordinate
     * @param int $y numeric coordinate
     */
    public function __construct(string $x, int $y)
    {
        if (!$this->validateCoordinates($x, $y)) {
            throw new WrongPointCoordinates();
        }

        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Returns color(const COLOR_BLACK|COLOR_WHITE).
     *
     * @return int
     */
    public function getColor()
    {
        return ($this->map[$this->x] - $this->y) % 2 === 0 ? self::COLOR_BLACK : self::COLOR_WHITE;
    }

    /**
     * Validates coordinates.
     *
     * @return bool
     */
    protected function validateCoordinates(string $x, int $y)
    {
        if (!in_array($x, array_keys($this->map))) {
            return false;
        }

        if (!in_array($y, $this->map)) {
            return false;
        }

        return true;
    }
}
