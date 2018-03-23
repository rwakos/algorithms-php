<?php
namespace App\Models;
/*
 * Fizzbuzz:
 * print fizz if number is multiple by 3
 * print buzz if number is multiple by 5
 * print fizzbuzz if number is multiple by 3 and 5
 * else print the number....
 * */
class Fizzbuzz{

    function printFizbuzz($n){
        if (empty($n)){
            throw new \ArgumentCountError;
        }

        if (!is_numeric($n)){
            throw new \InvalidArgumentException;
        }

        $list = [];

        for ($i=1;$i<=$n;$i++){
            if (($i % 15) === 0){
                array_push($list,'fizzbuzz');
            } elseif (($i % 3) === 0){
                array_push($list,'fizz');
            } elseif (($i % 5) === 0){
                array_push($list,'buzz');
            } else {
                array_push($list, $i);
            }
        }
        return implode(" ",$list);
    }
}