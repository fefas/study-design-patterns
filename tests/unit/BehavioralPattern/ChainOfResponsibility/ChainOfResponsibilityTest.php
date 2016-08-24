<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class ChainOfResponsibilityTest extends \PHPUnit_Framework_TestCase
{
    private $chainOfResponsibility = null;

    protected function setUp()
    {
        $fakeHandlerA = new FakeHandlerA();
        $fakeHandlerB = new FakeHandlerB($fakeHandlerA);
        $fakeHandlerC = new FakeHandlerC($fakeHandlerB);

        $this->chainOfResponsibility = $fakeHandlerC;
    }

    /**
     * @test
     */
    public function aResultIsReturnedGivenAHandleableInput()
    {
        $input = new FakeInput(Input::HANDLEABLE);

        $result = $this->chainOfResponsibility->handle($input);

        $this->assertInstanceOf(
            'Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility\Result',
            $result
        );
    }

    /**
     * @test
     * @dataProvider requestTypesAndExpectedMessages
     */
    public function specificHandlerIsUsedWhenGivenSpecificInput(
        $inputType,
        $expectedMessage
    ) {
        $input = new FakeInput($inputType);

        $result = $this->chainOfResponsibility->handle($input);

        $this->assertEquals($expectedMessage, $result->message());
    }

    public function requestTypesAndExpectedMessages()
    {
        return [
            [Input::HANDLEABLE_BY_A, 'Input was handled by A'],
            [Input::HANDLEABLE_BY_B, 'Input was handled by B'],
            [Input::HANDLEABLE_BY_C, 'Input was handled by C'],
        ];
    }

    /**
     * @test
     * @expectedException \Exception
     * @expectedExceptionMessage Could not find handler to the given request
     */
    public function exceptionOccursWhenGivenAnUnhandleableInput()
    {
        $input = new FakeInput(INput::UNHANDLEABLE);

        $this->chainOfResponsibility->handle($input);
    }
}
