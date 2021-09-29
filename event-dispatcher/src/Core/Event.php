<?php

namespace App\Core;

use ReflectionClass;

abstract class Event
{
    public function getName()
    {
        return (new ReflectionClass($this))->getShortName();
    }

}
