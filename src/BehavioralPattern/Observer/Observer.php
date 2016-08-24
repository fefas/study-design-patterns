<?php

namespace Fefas\Study\Pattern\BehavioralPattern\Observer;

abstract class Observer
{
    abstract public function update(Subject $observer);
}
