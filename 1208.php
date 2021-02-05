<?php
class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @param Integer $maxCost
     * @return Integer
     */
    public function equalSubstring($s, $t, $maxCost)
    {
        $n    = strlen($s);
        $diff = [];
        for ($i = 0; $i < $n; $i++) {
            $diff[$i] = abs(ord($s[$i]) - ord($t[$i]));
        }
        $max   = 0;
        $start = 0;
        $end   = 0;
        $sum   = 0;
        while ($end < $n) {
            $sum += $diff[$end];
            while ($sum > $maxCost) {
                $sum -= $diff[$start];
                $start++;
            }
            $max = max($max, $end - $start + 1);
            $end++;
        }
        return $max;
    }
}
