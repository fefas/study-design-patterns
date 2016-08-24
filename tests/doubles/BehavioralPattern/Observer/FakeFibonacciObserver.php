<?php

namespace Fefas\Study\Pattern\BehavioralPattern\Observer;

class FakeFibonacciObserver extends Observer
{
    private $value = -1;

    public function getValue(): int
    {
        return $this->value;
    }

    public function update(Subject $indexSubject)
    {
        $this->value = $this->calculateFibonacci($indexSubject->getValue());
    }

    private function calculateFibonacci($n)
    {
        if ($n < 2) {
            return 1;
        }

        return $this->calculateFibonacci($n - 1) + $this->calculateFibonacci($n - 2);
    }
}
