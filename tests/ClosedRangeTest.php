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
     * @expectedException InvalidArgumentException
     */
    public function 上端点より下端点が大きい閉区間を作ろうとした場合は例外が投げられること()
    {
        $range = new ClosedRange(5, 4);
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
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage undifined property hoge
     */
    public function 不正なプロパティ取得時に例外が投げられるこt()
    {
        $range = new ClosedRange(3, 8);
        $range->hoge;
    }

    /**
     * @test
     */
    public function 区間の文字列表現が取得できること()
    {
        $range = new ClosedRange(3, 8);
        $this->assertSame('[3,8]', sprintf('%s', $range));
    }

    /**
     * @test
     */
    public function 指定した定数が含むか判定出来ること()
    {
        $range = new ClosedRange(3, 8);
        $this->assertTrue($range->include(3));
        $this->assertSame(true, $range->include(3));
    }

}

