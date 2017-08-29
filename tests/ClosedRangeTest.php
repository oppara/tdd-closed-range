<?php
use PHPUnit\Framework\TestCase;
require_once dirname(__DIR__) . '/ClosedRange.php';

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
        $range = new ClosedRange(3, 8);
        $this->assertTrue($range instanceof ClosedRange);
    }
}

