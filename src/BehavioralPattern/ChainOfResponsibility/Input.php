<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

abstract class Input
{
    const UNHANDLEABLE = -1;
    const HANDLEABLE = 1;
    const HANDLEABLE_BY_A = 2;
    const HANDLEABLE_BY_B = 3;
    const HANDLEABLE_BY_C = 4;

    private $type = null;

    public function __construct(int $type)
    {
        $this->type = $type;
    }

    public function type(): int
    {
        return $this->type;
    }
}
