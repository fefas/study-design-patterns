<?php

namespace Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility;

class ChainOfResponsibilityTest extends \PHPUnit_Framework_TestCase
{
    private $chainOfResponsibility = null;

    protected function setUp()
    {
        $fakeRequestHandlerA = new FakeRequestHandlerA();
        $fakeRequestHandlerB = new FakeRequestHandlerB($fakeRequestHandlerA);
        $fakeRequestHandlerC = new FakeRequestHandlerC($fakeRequestHandlerB);

        $this->chainOfResponsibility = $fakeRequestHandlerC;
    }

    /**
     * @test
     */
    public function anAnswerIsReturnedGivenAHandleableRequest()
    {
        $request = new FakeRequest(Request::HANDLEABLE);

        $response = $this->chainOfResponsibility->handle($request);

        $this->assertInstanceOf(
            'Fefas\Study\Pattern\BehavioralPattern\ChainOfResponsibility\Response',
            $response
        );
    }

    /**
     * @test
     * @dataProvider requestTypesAndExpectedMessages
     */
    public function specificHandlerIsUsedWhenGivenSpecificRequest(
        $requestType,
        $expectedMessage
    ) {
        $request = new FakeRequest($requestType);

        $response = $this->chainOfResponsibility->handle($request);

        $this->assertEquals($expectedMessage, $response->message());
    }

    public function requestTypesAndExpectedMessages()
    {
        return [
            [Request::HANDLEABLE_BY_A, 'Request was handled by A'],
            [Request::HANDLEABLE_BY_B, 'Request was handled by B'],
            [Request::HANDLEABLE_BY_C, 'Request was handled by C'],
        ];
    }

    /**
     * @test
     * @expectedException \Exception
     * @expectedExceptionMessage Could not find handler to the given request
     */
    public function exceptionOccursWhenGivenAUnhandleableRequest()
    {
        $request = new FakeRequest(Request::UNHANDLEABLE);

        $this->chainOfResponsibility->handle($request);
    }
}
