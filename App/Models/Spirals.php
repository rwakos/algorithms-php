<?php

namespace App\Models;
/*
 * Create a Spiral in a Matrix.
 * Min square value 2
 * */
class Spirals
{
    private $array;
    private $square;
    public function __construct($n)
    {
        if (empty($n)){
            throw new \ArgumentCountError;
        }

        if (!is_numeric($n)){
            throw new \InvalidArgumentException;
        }

        if ($n<2){
            throw new \InvalidArgumentException;
        }

        $this->square = $n;
        $this->array = [];
        for ($i=0;$i<$n;$i++){
            $this->array[] = [];
        }
    }
    //-----------------------------------------------------------------------------------------------------------------------
    public function createSpiral(){
        $this->setSpiral(0,$this->square);
        return $this->array;
    }

    private function setSpiral($offset=0,$n,$mark=0, $orientation='RIGHT')
    {
        switch ($orientation){
            case 'RIGHT':
                for ($i=$offset;$i<$n;$i++){
                    $mark++;
                    $this->array[$offset][$i] = $mark;
                }
                if ($mark===($this->square)*($this->square)){
                    return;
                }
                $this->setSpiral($offset,$n,$mark,'DOWN');
                break;
            case 'DOWN':
                for ($i=1+$offset;$i<$n;$i++){
                    $mark++;
                    $this->array[$i][$n-1] = $mark;
                }
                $this->setSpiral($offset,$n,$mark,'LEFT');
                break;
            case 'LEFT':
                for ($i=1;$i<$n-$offset;$i++){
                    $mark++;
                    $this->array[$n-1][$n-1-$i] = $mark;
                }
                $this->setSpiral($offset,$n,$mark,'UP');
                break;
            case 'UP':
                for ($i=1;$i<$n-1-$offset;$i++){
                    $mark++;
                    $this->array[$n-1-$i][$offset] = $mark;
                }
                $this->setSpiral(++$offset,--$n,$mark,'RIGHT');
                break;
        }
    }

}

