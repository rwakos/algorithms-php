<?php
namespace App\Models;

/*
 * Merge Sort: Sort an Integer list, using Merge Sort.
 * Divide and Conquer. Recursive...
 * Complexity: n(log(n))
 * */

class MergeSort
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

        return $this->mergeSort($array);
        /*for ($j=2;$j<count($array);$j++){
            $key = $array[$j];
            $i = $j-1;
            while ($i>=0 && $array[$i]>$key){   //Fix on pseudocode in the book ($i>0 ==> $i>=0)
                $array[$i+1]=$array[$i];
                $i--;
            }
            $array[$i+1]=$key;
        }*/

        return $array;
    }

    private function mergeSort($array){
        if (count($array)===1){
            return $array;
        }

        $half = floor(count($array)/2);
        $leftSide = array_slice($array,0,$half);
        $rightSide = array_slice($array,$half,count($array));

        return $this->merge($this->mergeSort($leftSide), $this->mergeSort($rightSide));

    }

    private function merge($left, $right){
        $results = [];

        while (count($left)>0 && count($right)>0){
            if ($left[0]<$right[0]) {
                array_push($results, array_shift($left));
            } else {
                array_push($results, array_shift($right));
            }
        }

        return array_merge($results,$left,$right);

    }

}