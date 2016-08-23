<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class FakeHandlerC extends Handler
{
    public function handle(Input $input): Result
    {
        if ($input->type() == Input::HANDLEABLE or $input->type() == Input::HANDLEABLE_BY_C) {
            return new FakeResult('Input was handled by C');
        }

        return $this->handleUsingSuccessor($input);
    }
}
