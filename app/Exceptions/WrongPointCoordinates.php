<?php

namespace App\Exceptions;

use RuntimeException;

/**
 * Class WrongPointCoordinates
 * This class represents an coordinates error.
 */
class WrongPointCoordinates extends RuntimeException
{
    public $message = 'Wrong point coordinates';
}
