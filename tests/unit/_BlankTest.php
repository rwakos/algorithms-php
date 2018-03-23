<?php

use PHPUnit\Framework\TestCase;
use App\Models\Palindrome;

class PalidromeTest extends TestCase{

    public $test1 = "abba";
    public $test2 = "hello";

    function testIsPalindrome(){
        $obj = new Palindrome();
        $result = $obj->isPalindrome($this->test1);
        $this->assertEquals(true, $result);
    }

    function testIsNotPalindrome(){
        $obj = new Palindrome();
        $result = $obj->isPalindrome($this->test2);
        $this->assertFalse($result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        $obj = new Palindrome();
        $obj->isPalindrome();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        $strObj = new Steps('a');
        $strObj->setSteps();
    }
}