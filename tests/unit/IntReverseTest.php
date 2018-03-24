<?php
use PHPUnit\Framework\TestCase;
use App\Models\IntReverse;

class IntReverseTest extends TestCase{

    public $test1 = 1234567;
    public $test2 = 45687000;

    function testReverseNumber(){
        $obj = new IntReverse($this->test1);
        $result = $obj->reverseNumber();
        $this->assertEquals(7654321, $result);

        $obj = new IntReverse($this->test2);
        $result = $obj->reverseNumber();
        $this->assertEquals(78654, $result);
    }


    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new IntReverse();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        new IntReverse(1.25);
    }
}