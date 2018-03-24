<?php
use PHPUnit\Framework\TestCase;
use App\Models\Pyramid;

class PyramidTest extends TestCase{

    public $test1 = 2;
    public $test2 = 5;

    public $result1 = [" # ","###"];
    public $result2 = ["    #    ","   ###   ","  #####  "," ####### ","#########"];

    function testGetPyramid(){
        $obj = new Pyramid($this->test1);
        $result = $obj->getPyramid();
        $this->assertEquals($this->result1, $result);

        $obj = new Pyramid($this->test2);
        $result = $obj->getPyramid();
        $this->assertEquals($this->result2, $result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new Pyramid();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed1()
    {
        new Pyramid('a');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed2()
    {
        new Pyramid(1.2);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed3()
    {
        new Pyramid(1);
    }
}