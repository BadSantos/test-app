<?php

namespace App\Interfaces;

use App\Components\ChessPoint;

/**
 * Interface ChessInterface.
 */
interface ChessInterface
{
    /**
     * Check if two point are same color.
     */
    public function isSameColor(ChessPoint $point1, ChessPoint $point2): bool;
}
