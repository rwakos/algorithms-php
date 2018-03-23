<?php
use PHPUnit\Framework\TestCase;
use App\Models\Fizzbuzz;

class FizzbuzzTest extends TestCase{
    public $test1 = "1 2 fizz 4 buzz fizz 7 8 fizz buzz 11 fizz 13 14 fizzbuzz";

    function testPrintFizzbuzz(){
        $obj = new Fizzbuzz();
        $result = $obj->printFizbuzz(15);
        $this->assertEquals($this->test1, $result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        $obj = new Fizzbuzz();
        $obj->printFizbuzz();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        $obj = new Fizzbuzz();
        $obj->printFizbuzz('a');
    }
}