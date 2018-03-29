<?php
use PHPUnit\Framework\TestCase;
use App\Models\Spirals;

class SpiralsTest extends TestCase{

    public $test1 = 2;
    public $test2 = 5;
    public $result1 = [
        [1,2],
        [4,3]
    ];
    public $result2 = [
        [1,2,3,4,5],
        [16,17,18,19,6],
        [15,24,25,20,7],
        [14,23,22,21,8],
        [13,12,11,10,9],
    ];
    function testSpiral1(){
        $obj = new Spirals($this->test1);
        $result = $obj->createSpiral();
        $this->assertEquals($this->result1, $result);
    }

    function testSpiral2(){
        $obj = new Spirals($this->test2);
        $result = $obj->createSpiral();
        $this->assertEquals($this->result2, $result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new Spirals();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        new Spirals('a');
    }
}