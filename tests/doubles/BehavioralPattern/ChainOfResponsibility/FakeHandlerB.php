<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class FakeHandlerB extends Handler
{
    public function handle(Input $input): Result
    {
        if ($input->type() == Input::HANDLEABLE or $input->type() == Input::HANDLEABLE_BY_B) {
            return new FakeResult('Input was handled by B');
        }

        return $this->handleUsingSuccessor($input);
    }
}
