<?

namespace App\Models;

class PrimeNumbers {

    public $size;

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

        $this->size = $n;

    }

    function getPrimes(){
        $list = array_filter(range(2,$this->size),
            function($x){
                for ($i=2; $i < $x; $i++){
                    if ($x % $i === 0){
                        return false;
                    }
                }
                return true;
            });

        return implode(", ",$list);
    }

    function getPrimesMathWay(){
        $n = $this->size;
        $acum = [];
        $list = array_filter(range(2,$n),
            function($x) use (&$acum) {
                foreach ($acum as $l){
                    if ($x % $l === 0){
                        return false;
                    }
                }
                array_push($acum,$x);
                return true;
            });

        return implode( ", ",$list);
    }
}


?>