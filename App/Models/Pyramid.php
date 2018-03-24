<?php
namespace App\Models;

/*
 * Get a pyramid using #
 * Add two spaces for every steps going backwards from the last level
 * Minimum levels=2
 * */

class Pyramid{
    private $levels;

    public function __construct($l)
    {
        if (empty($l)){
            throw new \ArgumentCountError;
        }

        if (!is_numeric($l)){
            throw new \InvalidArgumentException;
        }

        if (!is_int($l)){
            throw new \InvalidArgumentException;
        }

        if ($l<2){
            throw new \InvalidArgumentException;
        }

        $this->levels = $l;
    }

    public function getPyramid(){
        $result = [];
        $n = $this->levels;
        //First: get the size of the n-1 row to calculate the size.
        $size = (($n-1)*2) + 1;   //2 spaces + pound sign

        for ($i=0;$i<$n;$i++){
            $spaces = ($n-$i-1);  //We substract 1 because we are moving from zero index
            $row = '';
            for ($j=0;$j<$size;$j++){
                if (($j<$spaces)^($j>($size-$spaces-1))){
                    $row.=" ";
                } else {
                    $row.="#";
                }
            }
            array_push($result,$row);
        }
    return $result;
    }


}