<?php
use PHPUnit\Framework\TestCase;
use App\Models\Vowels;

class VowelsTest extends TestCase{

    public $test1 = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

    function testCountVowels_1(){
        $obj = new Vowels($this->test1);
        $result = $obj->getCountVowels_1();
        $this->assertEquals(168, $result);
    }

    function testCountVowels_2(){
        $obj = new Vowels($this->test1);
        $result = $obj->getCountVowels_2();
        $this->assertEquals(168, $result);
    }

    function testCountVowels_3(){
        $obj = new Vowels($this->test1);
        $result = $obj->getCountVowels_3();
        $this->assertEquals(168, $result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new Vowels();
    }

}