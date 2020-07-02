<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    public function maxScoreSightseeingPair($A)
    {
        $left = $A[0] + 0;
        $ret  = PHP_INT_MIN;
        for ($j = 1; $j < count($A); $j++) {
            $right = $A[$j] - $j;
            $ret   = max($ret, $left + $right);
            $left  = max($left, $A[$j] + $j);
        }
        return $ret;
    }
}
