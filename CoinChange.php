<?php
class Solution
{

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     * @github https://github.com/yumindayu/leetcode-php

    ［1,2,5]  11




    1  2  3  4  5  6  7  8  9  10  11

    0

    dp[i] 到i台阶时的最小值

    dp[i] = min{i-1, i-2, i-5} + 1

     */
    public function coinChange($coins, $amount)
    {
        $dp    = array_fill(0, $amount + 1, PHP_INT_MAX);
        $dp[0] = 0;
        for ($i = 1; $i <= $amount; $i++) {
            for ($j = 0; $j < count($coins); $j++) {
                if ($coins[$j] <= $i) {
                    $dp[$i] = min($dp[$i - $coins[$j]] + 1, $dp[$i]);
                }

            }
        }
        return $dp[$amount] > $amount ? -1 : $dp[$amount];

    }
}
