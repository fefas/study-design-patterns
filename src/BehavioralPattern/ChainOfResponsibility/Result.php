<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class Result
{
    private $message = null;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function message(): string
    {
        return $this->message;
    }
}
