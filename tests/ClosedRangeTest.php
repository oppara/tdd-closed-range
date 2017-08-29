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

    /**
     * @test
     */
    public function 下端点が取得できること()
    {
        $range = new ClosedRange(3, 8);
        $this->assertSame(3, $range->lower_endpoint);
    }

    /**
     * @test
     */
    public function 上端点が取得できること()
    {
        $range = new ClosedRange(3, 8);
        $this->assertSame(8, $range->upper_endpoint);
    }

    /**
     * @test
     */
    public function 区間の文字列表現が取得できること()
    {
        $range = new ClosedRange(3, 8);
        $this->assertSame('[3,8]', $range);
    }
}

