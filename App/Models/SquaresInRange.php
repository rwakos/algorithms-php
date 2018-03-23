<?php
namespace App\Models;

class SquaresInRange{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        if ((empty($a))^(empty($b))){
            throw new \ArgumentCountError;
        }

        if ((!is_numeric($a))^(!is_numeric($b))){
            throw new \InvalidArgumentException;
        }

        if ($b<$a){
            $this->b = $a;
            $this->a = $b;
        } else {
            $this->a = $a;
            $this->b = $b;
        }
    }
    /*
     * O(n) Complexity
     * */
    function getSquaresInRangeIterative(){
        $a = $this->a;
        $b = $this->b;

        $count = 0;
        for ($i=$a;$i<=$b;$i++){
            $sqrt = sqrt($i);
            if($sqrt == intval($sqrt))
            {
                $count++;
            }
        }
        return $count;
    }
    /*
     * O(1) Complexity
     * */
    function getSquaresInRangeMathWay(){
        $a = $this->a;
        $b = $this->b;
        return floor(sqrt($b)) - ceil(sqrt($a)) + 1;
    }

}