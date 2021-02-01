<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer[]
     */
    public function fairCandySwap($A, $B)
    {
        $sumA  = array_sum($A);
        $sumB  = array_sum($B);
        $delta = floor(($sumA - $sumB) / 2);
        $rec   = array_flip(array_unique($A));

        $ans = [];
        foreach ($B as $num) {
            $x = $num + $delta;
            if (isset($rec[$x])) {
                $ans[0] = $x;
                $ans[1] = $num;
                break;
            }
        }
        return $ans;

    }
}
