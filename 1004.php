<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    public function longestOnes($A, $K)
    {
        $left  = 0;
        $right = 0;
        $res   = 0;
        $k     = 0;
        while ($right < count($A)) {
            if ($A[$right] == 0) {
                $k++;
            }
            while ($k > $K) {
                if ($A[$left] == 0) {
                    $k--;
                }
                $left++;
            }
            $res = max($res, $right - $left + 1);
            $right++;
        }
        return $res;
    }
}
