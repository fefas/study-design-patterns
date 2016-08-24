<?php

namespace Fefas\Study\Pattern\BehavioralPattern\Observer;

class FakeFactorialObserver extends Observer
{
    private $value = -1;

    public function getValue(): int
    {
        return $this->value;
    }

    public function update(Subject $indexSubject)
    {
        $this->value = $this->calculateFactorial($indexSubject->getValue());
    }

    private function calculateFactorial($n, $accumulator = 1)
    {
        return $n < 2 ? $accumulator : $this->calculateFactorial($n - 1, $accumulator * $n);
    }
}
