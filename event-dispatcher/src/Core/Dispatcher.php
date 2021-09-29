<?php 

namespace App\Core;


class Dispatcher
{
    protected $listeners = [];


    public function getListeners()
    {
        return $this->listeners;
    }

    public function addListener($name, $listener)
    {
        return $this->listeners[$name][] = $listener;
    }

    public function getListenersByEvent($name)
    {

        return $this->hasListener($name) 
            ? $this->listeners[$name]
            : [];
    }

    public function hasListener($name)
    {
        return isset($this->listeners[$name]);
    }


    public function dispatch(Event $event)
    {
        foreach($this->getListenersByEvent($event->getName()) as $listener){
            $listener->handle($event);
        }
    }

}
