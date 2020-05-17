<?php
class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    public function isHappy($n)
    {
        return $this->helper($n);
    }

    private function helper($n)
    {
        $sum = 0;
        while ($n > 0) {
            $sum += ($n % 10) * ($n % 10);
            $n = floor($n / 10);
        }
        if ($sum == 1) {
            return true;
        }
        if ($sum == 4) {
            return false;
        }
        return $this->helper($sum);
    }
}
