<?php

namespace App\Models;

class Palindrome{

    function isPalindrome($word){
        if (empty($word)){
            throw new \ArgumentCountError;
        }

        $array = str_split($word);
        $bool = true;
        $n = count($array);
        for ($i=0;$i<$n;$i++){
            if ($array[$i]!==$array[$n-$i-1]){
                $bool = false;
                return false;
            }
        }
        return true;
    }

}
