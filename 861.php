<?php
class Solution
{

    /**
     * @param Integer[][] $A
     * @return Integer
     */
    public function matrixScore($A)
    {
        $m   = count($A);
        $n   = count($A[0]);
        $ret = $m * (1 << ($n - 1));
        for ($j = 1; $j < $n; $j++) {
            $flag = 0;
            for ($i = 0; $i < $m; $i++) {
                $flag += $A[$i][0] == 1 ? $A[$i][$j] : (1 - $A[$i][$j]);
            }
            $k = max($flag, $m - $flag);
            $ret += $k * (1 << ($n - $j - 1));
        }
        return $ret;

    }
}
