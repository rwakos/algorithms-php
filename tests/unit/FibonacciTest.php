<?php

use PHPUnit\Framework\TestCase;
use App\Models\Fibonacci;

class FibonacciTest extends TestCase
{
    function testIfFibIter(){
        $obj = New Fibonacci();
        $result = $obj->fibIterative(3);
        $this->assertEquals(2, $result);
        $result = $obj->fibIterative(4);
        $this->assertEquals(3, $result);
    }

    function testIfFibRecursive(){
        $obj = New Fibonacci();
        $result = $obj->fibRecursive(3);
        $this->assertEquals(2, $result);
        $result = $obj->fibRecursive(4);
        $this->assertEquals(3, $result);
    }

    function testIfFibMemoize(){
        $obj = New Fibonacci();
        $result = $obj->fibMemoize(3);
        $this->assertEquals(2, $result);
        $result = $obj->fibMemoize(4);
        $this->assertEquals(3, $result);
    }


}
