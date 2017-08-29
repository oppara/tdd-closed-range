<?php
use PHPUnit\Framework\TestCase;

class ClosedRangeTest extends TestCase
{

    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    /**
     * @test
     */
    public function ClosedRangeオブジェクトが作成できること()
    {
        $range = new ClosedRange();
        $this->assertTrue($range instanceof ClosedRange);
    }
}

