<?php

namespace App\Tests\Unit;

use App\Tests\Stubs\EventStub;
use App\Tests\Stubs\ListenerStub;
use PHPUnit\Framework\TestCase;
use TypeError;

class ListenerTest extends TestCase
{

    /** @test */
    public function handle_method_throws_error_if_invalid_event_given()
    {

        $this->expectException(TypeError::class);

        $listener = new ListenerStub();

        $listener->handle('not an event');

    }


    /** @test */

    public function handle_method_accepts_event()
    {
        $listener = new ListenerStub();
        $listener->handle(new EventStub());
        $this->addToAssertionCount(1);
    }


}

