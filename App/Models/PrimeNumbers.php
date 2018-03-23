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

        $this->size = $n;

    }

    function getPrimes(){
        $n = $this->size;

        $list = array();
        for ($i=2; $i <= $n; $i++){
            $bool = true;
            foreach ($list as $l){
            //for ($j=2; $j < $i; $j++){
                if ($i % $l === 0){
                    $bool = false;
                    $j = $i;
                }
            }

            if ($bool){
                $list[] = $i;
                //array_push($list,$i);
            }
        }
        //echo "Going to print:<br>";
        return $list;
    }

}


?>