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
     * @dataProvider includeProvider
     */
    public function 指定した定数が含むか判定出来ること($expected, $num)
    {
        $range = new ClosedRange(3, 8);
        $this->assertSame($expected, $range->include($num));
    }

    public function includeProvider()
    {
        return [
            [ false, 2 ],
            [ true, 3 ],
            [ true, 5 ],
            [ true, 8 ],
            [ false, 9 ],
        ];
    }

    /**
     * @test
     * @dataProvider equalsProvider
     */
    public function 別の閉区間と等価か判定できること($expected, $lower, $upper)
    {
        $range = new ClosedRange(3, 8);
        $other_range = new ClosedRange($lower, $upper);
        $this->assertSame($expected, $range->equals($other_range));
    }

    public function equalsProvider()
    {
        return [
            [true, 3, 8],
            [false, 4, 8],
            [false, 2, 8],
            [false, 3, 9],
            [false, 3, 7],
        ];

    }

    /**
     * @test
     * @dataProvider containProvider
     */
    public function 別の閉区間が完全に含まれるか判定できること($expected, $lower, $upper)
    {
        $range = new ClosedRange(3, 8);
        $other_range = new ClosedRange($lower, $upper);
        $this->assertSame($expected, $range->contain($other_range));
    }

    public function containProvider()
    {
        return [
            [true, 3, 8],
            [true, 4, 8],
            [false, 2, 8],
            [false, 3, 9],
            [true, 3, 7],
            [false, 2, 9],
        ];

    }
}

