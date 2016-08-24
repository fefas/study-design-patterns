<?php

namespace Fefas\Study\Pattern\BehavioralPattern\Observer;

class FakeIndexSubject extends Subject
{
    private $value = -1;

    public function setValue(int $newValue)
    {
        $this->value = $newValue;

        $this->notify();
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
