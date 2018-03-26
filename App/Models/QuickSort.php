<?php
namespace App\Models;

/*
 * Quick Sort: Sort an Integer list, using Quick Sort.
 * Split the list in two lesser and greater over a pivot value, then recurse... without including the pivot
 * Complexity: n^2  ~ n(log(n)) expected
 * */

class QuickSort
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
        return $this->qSort($array);
    }

    private function qSort($arr){
        if (count($arr)===0){
            return [];
        }
        $left = [];
        $right = [];
        $pivot = $arr[0];
        //PHP Hack for array_merge at the end...
        $pivot_arr = [];
        $pivot_arr[] = $pivot;

        for ($i=1;$i<count($arr);$i++){
            if ($arr[$i]<$pivot){
                array_push($left,$arr[$i]);
            } else {
                array_push($right,$arr[$i]);
            }
        }

        return array_merge(
            $this->qSort($left),
            $pivot_arr,
            $this->qSort($right)
        );
    }

}