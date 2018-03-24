<?php
use PHPUnit\Framework\TestCase;
use App\Models\SquareRotated45;

class SquareRotated45Test extends TestCase{

    public $test1 = 2;
    public $test2 = 5;

    public $result1 = [" # ","###"," # "];
    public $result2 = ["    #    ","   ###   ","  #####  "," ####### ","#########"," ####### ","  #####  ","   ###   ","    #    "];

    function testGetSquareRotated45_1(){
        $obj = new SquareRotated45($this->test1);
        $result = $obj->getSquareRotated();
        $this->assertEquals($this->result1, $result);
    }

    function testGetSquareRotated45_2(){
        $obj = new SquareRotated45($this->test2);
        $result = $obj->getSquareRotated();
        $this->assertEquals($this->result2, $result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new SquareRotated45();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed1()
    {
        new SquareRotated45('a');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed2()
    {
        new SquareRotated45(1);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed3()
    {
        new SquareRotated45(2.5);
    }
}