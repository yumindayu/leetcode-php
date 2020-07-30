<?php
class Solution
{
    // 暴力回溯--超时
    // public $max;
    // /**
    //  * @param Integer $n
    //  * @return Integer
    //  */
    // function integerBreak2($n) {
    //     for ($i = 1; $i < $n; $i++) {
    //         $this->helper($i, 0, $n, 1);
    //     }
    //     return $this->max;
    // }

    // function helper($start, $sum, $n, $ret) {
    //     if ($start >= $n) return;
    //     if ($sum > $n) return;
    //     if ($sum == $n) {
    //         $this->max = max($this->max, $ret);
    //         return;
    //     }
    //     $sum += $start;
    //     array_push($ret, $start);
    //     $ret *= $start;
    //     for ($i = $start; $i < $n; $i++) {
    //         $this->helper($i, $sum, $n, $ret);
    //     }
    //     array_pop($ret);
    // }

    public function integerBreak($n)
    {
        $dp = array_fill(0, $n + 1, 0);
        for ($i = 2; $i <= $n; $i++) {
            $max = 0;
            for ($j = 1; $j < $i; $j++) {
                $max = max($max, max($j * ($i - $j), $j * $dp[$i - $j]));
            }
            $dp[$i] = $max;
        }
        return $dp[$n];
    }

}
