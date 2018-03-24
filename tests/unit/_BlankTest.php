<?php
use PHPUnit\Framework\TestCase;
use App\Models\THECLASS;

class THECLASSTest extends TestCase{

    public $test1 = "abba";
    public $test2 = "hello";

    function testNAMEOFTEST(){
        $obj = new THECLASS();
        $result = $obj->METHOD($this->test1);
        $this->assertEquals(true, $result);
    }

    function testNAMEOFTEST(){
        $obj = new THECLASS();
        $result = $obj->METHOD($this->test2);
        $this->assertFalse($result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new THECLASS();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        new THECLASS('a');
    }
}