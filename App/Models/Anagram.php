<?php

namespace App\Models;

class Anagram
{
    private $string1;
    private $string2;

    public function __construct($str1, $str2)
    {
        if ((empty($str1))||(empty($str2))){
            throw new \ArgumentCountError;
        }
        $this->string1 = strtolower(preg_replace('/[^\w]/i','',$str1));
        $this->string2 = strtolower(preg_replace('/[^\w]/i','',$str2));
    }
    //-----------------------------------------------------------------------------------------------------------------------
    public function isAnagram():bool
    {
        $a = str_split($this->string1);
        $b = str_split($this->string2);

        if (count($a)!==count($b)){
            return false;
        }

        if (count(array_diff($a,$b))===0){
            return true;
        }

        return false;
    }
    //-----------------------------------------------------------------------------------------------------------------------
    public function isAnagram2():bool
    {
        $a = str_split($this->string1);
        $b = str_split($this->string2);

        if (count($a)!==count($b)){
            return false;
        }

        $array_a = array_count_values($a);
        $array_b = array_count_values($b);

        foreach ($array_a as $key => $value){
            if (empty($array_b[$key])){
                return false;
                break;
            }
            if ($array_b[$key]!==$array_a[$key]){
                return false;
                break;
            }
        }
        return true;
    }
    //-----------------------------------------------------------------------------------------------------------------------
    public function isAnagram3():bool
    {
        $a = str_split($this->string1);
        $b = str_split($this->string2);
        sort($a);
        sort($b);
        return (implode("",$a)===implode("",$b)) ? true : false;
    }
}

