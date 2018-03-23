<?php

namespace App\Models;

class RotateMatrix{
    private $matrix;
    private $rotate_cases = [90, 180, 270];
    private $rotate;
    private $final_matrix = [];
    /*
     * It receives a matrix, $n is N square of the matrix, and it has to be greater than one
     * */

    public function __construct($matrix, $n, $rotate)
    {
        if ((empty($matrix))^(empty($n))^(empty($rotate))){
            throw new \ArgumentCountError;
        }

        if ($n<2){
            throw new \InvalidArgumentException;
        }

        if (!$this->validateMatrix($matrix, $n)){
            throw new \InvalidArgumentException;
        }

        if (!in_array($rotate, $this->rotate_cases)){
            throw new \InvalidArgumentException;
        }

        $this->matrix = $matrix;
        $this->rotate = $rotate;
        $this->final_matrix = $this->buildBlank($n);
    }

    public function rotateMatrix(){
        switch ($this->rotate){
            case 90:
                $this->rotate90();
                break;
            case 180:
                $this->rotate180();
                break;
            case 270:
                $this->rotate270();
                break;
        }
        return $this->final_matrix;
    }

    private function rotate90(){
        $n = count($this->matrix);
        for ($row=0;$row<$n;$row++){
            for ($col=0;$col<$n;$col++){
                $this->final_matrix[$col][$n-$row-1] = $this->matrix[$row][$col];
            }
        }
    }

    private function rotate270(){
        $n = count($this->matrix);
        for ($row=0;$row<$n;$row++){
            $temp = array_reverse($this->matrix[$row]);
            for ($col=0;$col<$n;$col++){
                $this->final_matrix[$col][$row] = $temp[$col];
            }
        }
    }

    private function rotate180(){
        $n = count($this->matrix);
        for ($row=0;$row<$n;$row++){
            $temp = array_reverse($this->matrix[$row]);
            $this->final_matrix[$n-$row-1] = $temp;
        }
    }

    private function validateMatrix($matrix, $n){
        foreach ($matrix as $row){
            if (count($row)!==$n){
                return false;
            }
        }
        return true;
    }

    public function buildBlank($n){
        $result = [];
        for ($i=0;$i<$n;$i++){
            $temp = [];
            for ($j=0;$j<$n;$j++){
                $temp[]="";
            }
            array_push($result,$temp);
        }
        return $result;
    }
}