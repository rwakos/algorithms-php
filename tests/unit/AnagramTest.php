<?php
use PHPUnit\Framework\TestCase;
use App\Models\Anagram;

class AnagramTest extends TestCase
{
    public $st1 = 'Hello';
    public $st2 = 'LleHo!.';

    public function testIsAnagram(){
        $strObj = new Anagram($this->st1, $this->st2);
        $response = $strObj->isAnagram();
        $this->assertEquals(true, $response);
    }

    public function testIsAnagram2(){
        $strObj = new Anagram($this->st1, $this->st2);
        $response = $strObj->isAnagram2();
        $this->assertEquals(true, $response);
    }

    public function testIsAnagram3(){
        $strObj = new Anagram($this->st1, $this->st2);
        $response = $strObj->isAnagram3();
        $this->assertEquals(true, $response);
    }


    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNonStringIsPassed()
    {
        $strObj = new Anagram( );
        $strObj->isAnagram();
    }
}