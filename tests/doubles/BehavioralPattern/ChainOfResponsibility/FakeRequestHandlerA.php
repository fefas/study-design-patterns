<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class FakeRequestHandlerA extends RequestHandler
{
    public function handle(Request $request): Response
    {
        if ($request->type() == Request::HANDLEABLE or $request->type() == Request::HANDLEABLE_BY_A) {
            return new FakeResponse('Request was handled by A');
        }

        return $this->handleUsingSuccessor($request);
    }
}
