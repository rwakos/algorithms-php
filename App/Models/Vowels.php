<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 3/26/2018
 * Time: 5:22 PM
 */
/*
 * Vowels in string
 * Get the count of Vowels in a String *
 * */
namespace App\Models;

class Vowels{
    private $string;

    public function __construct($str)
    {
        if (empty($str)) {
            throw new \ArgumentCountError;
        }

        $this->string = strtolower($str);  //Important!!!!
    }

    public function getCountVowels_1() //167 ms
    {
        $arr = str_split($this->string);
        $vowels = ['a','e','i','o','u'];
        $count = 0;
        foreach ($arr as $char)  //O(n)
        {
            if (in_array($char,$vowels)){ //O(m)
                $count++;
            }
        }
    return $count;
    }

    public function getCountVowels_2() //162 ms
    {
        $arr = str_split($this->string);
        $obj = array_count_values($arr);  //O(n)
        $vowels = ['a','e','i','o','u'];

        $count = 0;
        foreach ($vowels as $char){  //O(m)
            $count+= (!empty($obj[$char])) ? $obj[$char] :'0';
        }
        return $count;
    }

    public function getCountVowels_3() // 168 ms  O(n)~O(m)
    {
        preg_match_all('/[aeiou]/i', $this->string, $matches);
        return count($matches[0]);
    }
}