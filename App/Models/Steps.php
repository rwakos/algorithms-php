<?php

namespace App\Models;

class Steps
{
    private $steps;
    private $matrix;

    public function __construct($n)
    {
        if (empty($n)){
            throw new \ArgumentCountError;
        }
        if (!is_numeric($n)){
            throw new \InvalidArgumentException;
        }
        $this->matrix = array();
        $this->steps = $n;
    }
    //-----------------------------------------------------------------------------------------------------------------------
    public function setSteps(){
        $matrix = array();
        for ($row=0;$row<$this->steps;$row++){
            $row_string = '';
            for ($col=0;$col<$this->steps;$col++){
                $delta = $row+1;
                $row_string.= ($col<$delta) ? '#' : ' ';
            }
            $matrix[]=$row_string;
        }
        return $matrix;
    }
    //-----------------------------------------------------------------------------------------------------------------------
    private function setStepsRecursive($row=0,$row_string=''){
        //var_dump($this->matrix);
        $n = $this->steps;
        if ($n===$row){
            $array = ($this->matrix);
            return $array;
        }

        if (strlen($row_string)===$n){
            $this->matrix[]=$row_string;
            return $this->setStepsRecursive(++$row,'');
        }

        $delta = $row+1;
        $col = strlen($row_string);
        $row_string.= ($col<$delta) ? '#' : ' ';
        $this->setStepsRecursive($row,$row_string);

    }

    public function getMatrixRecursive(){
        $this->setStepsRecursive();
        return $this->matrix;
    }
}

