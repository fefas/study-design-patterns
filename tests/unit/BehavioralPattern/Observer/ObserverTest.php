<?php

namespace Fefas\Study\Pattern\BehavioralPattern\Observer;

class ObserverTest extends \PHPUnit_Framework_TestCase
{
    private $indexSubject = null;
    private $factorialObserver = null;
    private $fibonacciObserver = null;

    protected function setUp()
    {
        $this->indexSubject = new FakeIndexSubject();
        $this->factorialObserver = new FakeFactorialObserver();
        $this->fibonacciObserver = new FakeFibonacciObserver();

        $this->indexSubject->attach($this->factorialObserver);
        $this->indexSubject->attach($this->fibonacciObserver);
    }

    /**
     * @test
     * @dataProvider indexValueToSubjectAndExpectedValuesToObservers
     */
    public function observersShouldUpdateTheirStatesWhenTheyAreAttachedToTheSubject(
        int $indexValue,
        int $expectedValueToFactorialObserver,
        int $expectedValueToFibonacciObserver
    )
    {
        $this->indexSubject->setValue($indexValue);

        $this->assertEquals(
            $expectedValueToFactorialObserver,
            $this->factorialObserver->getValue()
        );
        $this->assertEquals(
            $expectedValueToFibonacciObserver,
            $this->fibonacciObserver->getValue()
        );
    }

    public function indexValueToSubjectAndExpectedValuesToObservers()
    {
        return [
            [0, 1, 1],
            [1, 1, 1],
            [2, 2, 2],
            [3, 6, 3],
            [4, 24, 5],
            [5, 120, 8],
            [6, 720, 13],
            [7, 5040, 21],
        ];
    }

    /**
     * @test
     */
    public function observersShouldNotUpdateTheirStatesIfWasDettachedFromTheSubject()
    {
        $this->indexSubject->dettach($this->fibonacciObserver);
        $this->indexSubject->dettach($this->factorialObserver);
        $this->indexSubject->setValue(7);

        $this->assertEquals(
            -1,
            $this->factorialObserver->getValue()
        );
        $this->assertEquals(
            -1,
            $this->fibonacciObserver->getValue()
        );
    }
}
