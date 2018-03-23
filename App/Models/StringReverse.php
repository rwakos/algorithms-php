<?php

namespace App\Models;

class StringReverse
{
    private $string;

    public function __construct($str)
    {
        if (empty($str)){
        throw new \ArgumentCountError;
        }
        $this->string = $str;
    }

    public function getReverseString(){
        $chars = str_split($this->string);
        $rev = array();
        $n = sizeof($chars);
        $i=0;
        while ($i<$n){
            $popped = array_pop($chars);
            array_push($rev,$popped);
            $i++;
        }
    return implode("",$rev);
    }
}