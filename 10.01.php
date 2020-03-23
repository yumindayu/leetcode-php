<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    public function merge(&$A, $m, $B, $n)
    {
        $i     = $m - 1;
        $j     = $n - 1;
        $index = $m + $n - 1;
        while ($j >= 0) {
            //$A[$index--] = ($i < 0 || $B[$j] >= $A[$i]) ? $B[$j--] : $A[$i--];
            if ($i < 0) {
                $A[$index] = $B[$j];
                $j--;
            } elseif ($A[$i] < $B[$j]) {
                $A[$index] = $B[$j];
                $j--;
            } else {
                $A[$index] = $A[$i];
                $i--;
            }
            $index--;
        }
    }
}
