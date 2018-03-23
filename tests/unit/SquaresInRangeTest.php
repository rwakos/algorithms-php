<?php
use PHPUnit\Framework\TestCase;
use App\Models\SquaresInRange;

class SquaresInRangeTest extends TestCase{

    public $a = 4;
    public $b = 26;

    function testSquareInRangeIterative(){
        $obj = new SquaresInRange(1, $this->a);
        $result = $obj->getSquaresInRangeIterative();
        $this->assertEquals(2, $result);

        $obj = new SquaresInRange(1, $this->b);
        $result = $obj->getSquaresInRangeIterative();
        $this->assertEquals(5, $result);
    }

    function testSquareInRangeMathWay(){
        $obj = new SquaresInRange(1, $this->a);
        $result = $obj->getSquaresInRangeMathWay();
        $this->assertEquals(2, $result);

        $obj = new SquaresInRange(1, $this->b);
        $result = $obj->getSquaresInRangeMathWay();
        $this->assertEquals(5, $result);
    }


    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        $obj = new SquaresInRange();
        $obj->getSquaresInRangeMathWay();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        new SquaresInRange('a',2);
        new SquaresInRange(2, 'a');
        new SquaresInRange('a','b');

    }
}