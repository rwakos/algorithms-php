<?php

namespace App\Models;

class Fibonacci{
    function fibIterative($n){
        $list = array(0,1);
        for ($i=2; $i<=$n; $i++){
            $elem = $list[$i-2]+$list[$i-1];
            array_push($list, $elem);
        }
        return $list[$n];
    }

    function fibRecursive($n){
        if ($n<2){
            return $n;
        }
        return $this->fibRecursive($n-2) + $this->fibRecursive($n-1);
    }

    function fibMemoize($n){
        $fibMemoize = call_user_func(function () {
            $serie = array(0 => 0, 1 => 1);
            $fib = function ($n) use (&$serie, &$fib) {
                if (!isset($serie[$n])) {
                    $serie[$n] = $fib($n - 1) + $fib($n - 2);
                }
                return $serie[$n];
            };
            return $fib;
        });

        return $fibMemoize($n);
    }


}

