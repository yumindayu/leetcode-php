<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     * @github https://github.com/yumindayu/leetcode-php

    输入:
    A = [1,2,3,0,0,0], m = 3
    B = [2,5,6],       n = 3


     */
    public function merge(&$A, $m, $B, $n)
    {
        $i     = $m - 1;
        $j     = $n - 1;
        $index = $m + $n - 1;
        while ($j >= 0) {
            $A[$index--] = ($i < 0 || $A[$i] < $B[$j]) ? $B[$j--] : $A[$i--];
            // if ($i < 0 || $A[$i] < $B[$j]) {
            //     $A[$index] = $B[$j];
            //     $j--;
            // } else {
            //     $A[$index] = $A[$i];
            //     $i--;
            // }
            // $index--;
        }
    }
}
