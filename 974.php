<?php
class Solution
{

    public $ret = [];
    /**
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    public function subarraysDivByK($A, $K)
    {
        $history    = [];
        $history[0] = 1;
        $res        = 0;
        $sum        = 0;
        foreach ($A as $num) {
            $sum = ($sum + $num) % $K;
            if ($sum < 0) {
                $sum += $K;
            }

            $res += $history[$sum]; # 这一行感觉是最不好理解的
            $history[$sum] += 1;
        }
        return $res;
    }

}
