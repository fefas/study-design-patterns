<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class FakeHandlerA extends Handler
{
    public function handle(Input $input): Result
    {
        if ($input->type() == Input::HANDLEABLE or $input->type() == Input::HANDLEABLE_BY_A) {
            return new FakeResult('Input was handled by A');
        }

        return $this->handleUsingSuccessor($input);
    }
}
