<?php
use PHPUnit\Framework\TestCase;
use App\Models\PrimeNumbers;

class PrimeNumbersTest extends TestCase
{
    public function testGetPrimes(){
        $list_test = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
        $obj = New PrimeNumbers(99);
        $prime_list = $obj->getPrimes();
        $this->assertEquals($list_test, $prime_list);
    }

    public function testResponseIsArray()
    {
        $obj = New PrimeNumbers(99);
        $prime_list = $obj->getPrimes();
        $this->assertTrue(is_array($prime_list), 'The response is not an Array.');
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfEmptyIsPassed()
    {
        new PrimeNumbers();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfStringIsPassed()
    {
        new PrimeNumbers('a');
    }
}