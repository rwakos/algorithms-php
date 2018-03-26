<?php
namespace App\Models;

/*
 * Insert Sort: Sort an Integer list, using Insert Sort.
 * Resemblance to sorting a hand in a card game, every card you receive, you sort it from right to left in your hand
 * Complexity: n^2
 * */

class InsertSort
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

        for ($j=2;$j<count($array);$j++){
            $key = $array[$j];
            $i = $j-1;
            while ($i>=0 && $array[$i]>$key){   //Fix on pseudocode in the book ($i>0 ==> $i>=0)
                $array[$i+1]=$array[$i];
                $i--;
            }
            $array[$i+1]=$key;
        }

        return $array;
    }

}