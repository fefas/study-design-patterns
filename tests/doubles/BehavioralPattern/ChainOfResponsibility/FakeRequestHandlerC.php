<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class FakeRequestHandlerC extends RequestHandler
{
    public function handle(Request $request): Response
    {
        if ($request->type() == Request::HANDLEABLE or $request->type() == Request::HANDLEABLE_BY_C) {
            return new FakeResponse('Request was handled by C');
        }

        return $this->handleUsingSuccessor($request);
    }
}
