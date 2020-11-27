<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @param Integer[] $C
     * @param Integer[] $D
     * @return Integer
     */
    public function fourSumCount($A, $B, $C, $D)
    {
        $map = [];
        foreach ($A as $a) {
            foreach ($B as $b) {
                if (isset($map[$a + $b])) {
                    $map[$a + $b]++;
                } else {
                    $map[$a + $b] = 1;
                }
            }
        }
        $ans = 0;
        foreach ($C as $c) {
            foreach ($D as $d) {
                if (isset($map[-$c - $d])) {
                    $ans += $map[-$c - $d];
                }
            }
        }
        return $ans;

    }
}
