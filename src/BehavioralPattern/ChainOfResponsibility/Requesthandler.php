<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

abstract class RequestHandler
{
    private $successor = null;

    public function __construct(RequestHandler $successor = null)
    {
        $this->successor = $successor;
    }

    public function handleUsingSuccessor(Request $request)
    {
        if (null !== $this->successor) {
            return $this->successor->handle($request);
        }

        throw new \Exception('Could not find handler to the given request');
    }

    abstract public function handle(Request $request): Response;
}
