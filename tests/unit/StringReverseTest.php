<?php
use PHPUnit\Framework\TestCase;
use App\Models\StringReverse;

class StringReverseTest extends TestCase
{
    public function testReversedString(){
        $string = 'Hello There';
        $strObj = new StringReverse($string);
        $reversed = $strObj->getReverseString();
        $this->assertEquals('erehT olleH', $reversed);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNonStringIsPassed()
    {
        $strObj = new StringReverse;
        $strObj->getReverseString();
    }
}