<?php

namespace Fefas\Study\Pattern\BehavioralPattern\Observer;

abstract class Subject
{
    private $observers = [];

    public function attach(Observer $observer)
    {
        if (false === in_array($observer, $this->observers)) {
            $this->observers[] = $observer;
        }
    }

    public function dettach(Observer $observer)
    {
        foreach ($this->observers as $key => $observerAttached) {
            if ($observer == $observerAttached) {
                unset($this->observers[$key]);
                break;
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
