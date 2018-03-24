<?php
namespace App\Models;
use App\Models\Pyramid;
/*
 * Build a square using # rotated 45 degrees, using the pyramid Algorithm
 * Minimum side length = 2
 */
class SquareRotated45{
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

    function getSquareRotated(){
        $result = [];
        $array_top = [];
        $array_bottom = [];
        $pyr = new Pyramid($this->levels);
        $array_top = $pyr->getPyramid();
        $array_bottom = $array_top;
        array_pop($array_bottom); //We take out the last row, because you will have it in the array_top
        return array_merge($array_top, array_reverse($array_bottom));
    }
}