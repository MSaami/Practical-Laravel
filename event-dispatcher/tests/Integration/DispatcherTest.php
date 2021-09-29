<?php

namespace App\Tests\Integration;

use App\Core\Dispatcher;
use App\Tests\Stubs\EventStub;
use App\Tests\Stubs\ListenerStub;
use PHPUnit\Framework\TestCase;

class DispatcherTest extends TestCase
{


    /** @test */

    public function it_can_dispatch_event()
    {
        $dispatcher = new Dispatcher();

        $event = new EventStub();

        $mockedListener = $this->createMock(ListenerStub::class);

        $mockedListener->expects($this->once())->method('handle')->with($event);

        $dispatcher->addListener('UserSignedIn', $mockedListener);

        $dispatcher->dispatch($event);

    }


    /** @test */

    public function it_can_dispatch_event_with_multiple_listener()
    {
        $dispatcher = new Dispatcher();

        $event = new EventStub();

        $mockedListener = $this->createMock(ListenerStub::class);
        $anotherMockedListener = $this->createMock(ListenerStub::class);

        $mockedListener->expects($this->once())->method('handle')->with($event);
        $anotherMockedListener->expects($this->once())->method('handle')->with($event);

        $dispatcher->addListener('UserSignedIn', $mockedListener);
        $dispatcher->addListener('UserSignedIn', $anotherMockedListener);

        $dispatcher->dispatch($event);

    }


}
