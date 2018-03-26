<?php
namespace App\Models;

/*
 * Selection Sort: Sort an Integer list, using Selection Sort.
 * Resemblance to sorting a hand in a card game, every card you receive, you sort it from right to left in your hand
 * Complexity: n^2
 * */

class SelectionSort
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

        for ($j=0;$j<count($array)-1;$j++){
            $key = $array[$j];
            $min_key = $key;
            $min_index = -1;

            for ($i=$j+1;$i<count($array);$i++){
                if ($array[$i]<$min_key){
                    $min_index = $i;
                    $min_key = $array[$i];
                }
            }

            if ($min_index!==-1){ //Swap
                $array[$j] = $min_key;
                $array[$min_index] = $key;
            }

        }

        return $array;
    }

}