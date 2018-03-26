<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 3/26/2018
 * Time: 1:54 PM
 */

namespace App\Models;

/*
 * Bubble Sort: Sort an Integer list, using Bubble Sort.
 *
 * Complexity: n^2
 * */

class BubbleSort
{
    private $array;

    public function __construct($arr){
        if (empty($arr)){
            throw new \ArgumentCountError;
        }

        if (!is_array($arr)){
            throw new \InvalidArgumentException;
        }

        if (count($arr)<2){
            throw new \InvalidArgumentException;
        }

        $this->array = $arr;
    }

    function sort(){
        $array = $this->array;

        for ($i=0;$i<count($array);$i++){
            for ($j=0;$j<count($array);$j++){
                if (($j+1<count($array))&&($array[$j]>$array[$j+1])){  //Prevent out of bounds!!!
                    //Swap
                    $swap = $array[$j];
                    $array[$j] = $array[$j+1];
                    $array[$j+1] = $swap;
                }
            }
        }

        return $array;
    }

}