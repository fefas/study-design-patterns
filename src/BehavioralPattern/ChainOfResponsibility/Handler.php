<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

abstract class Handler
{
    private $successor = null;

    public function __construct(Handler $successor = null)
    {
        $this->successor = $successor;
    }

    public function handleUsingSuccessor(Input $input)
    {
        if (null !== $this->successor) {
            return $this->successor->handle($input);
        }

        throw new \Exception('Could not find handler to the given request');
    }

    abstract public function handle(Input $input): Result;
}
