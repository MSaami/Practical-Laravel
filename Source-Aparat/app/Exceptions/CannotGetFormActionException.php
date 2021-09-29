<?php

namespace App\Exceptions;

use Exception;

class CannotGetFormActionException extends Exception
{
    public $message = 'Cannot get form action';
}
