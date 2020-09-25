<?php
class Solution
{

    public $res = [];
    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[]
     */
    public function numsSameConsecDiff($n, $k)
    {
        if ($n == 1) {
            array_push($this->res, 0);
        }
        for ($i = 1; $i <= 9; $i++) {
            $this->helper($i, $k, $n, 1);
        }

        return array_unique($this->res);
    }

    public function helper($number, $k, $n, $len)
    {
        if ($len == $n) {
            array_push($this->res, $number);
            return;
        }
        $last = $number % 10;
        if ($last + $k <= 9) {
            $this->helper($number * 10 + $last + $k, $k, $n, $len + 1);
        }
        if ($last - $k >= 0) {
            $this->helper($number * 10 + $last - $k, $k, $n, $len + 1);
        }
    }
}
