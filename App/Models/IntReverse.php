<?php

namespace App\Models;

/*
 * Reverse a Int number, and return the reversed Int number
 *
 * */
class IntReverse{
    private $int_number;

    function __construct($n)
    {
        if (empty($n)){
            throw new \ArgumentCountError;
        }

        if (!is_numeric($n)){
            throw new \InvalidArgumentException;
        }

        if (!is_int($n)){
            throw new \InvalidArgumentException;
        }

        $this->int_number = $n;
    }

    function reverseNumber(){
        $number_array = str_split((string)$this->int_number);
        $result = [];
        $i=count($number_array)-1;

        while ($i>=0){
            array_push($result,$number_array[$i]);
            $i--;
        }

        return intval(implode("",$result));
    }
}