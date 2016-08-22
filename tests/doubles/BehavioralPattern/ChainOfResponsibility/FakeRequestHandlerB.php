<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class FakeRequestHandlerB extends RequestHandler
{
    public function handle(Request $request): Response
    {
        if ($request->type() == Request::HANDLEABLE or $request->type() == Request::HANDLEABLE_BY_B) {
            return new FakeResponse('Request was handled by B');
        }

        return $this->handleUsingSuccessor($request);
    }
}
