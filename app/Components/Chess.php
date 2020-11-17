<?php

namespace App\Components;

use App\Interfaces\ChessInterface;

/**
 * Class Chess.
 */
class Chess implements ChessInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSameColor(ChessPoint $point1, ChessPoint $point2): bool
    {
        return $point1->getColor() === $point2->getColor();
    }
}
