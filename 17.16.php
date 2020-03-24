<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     * @github https://github.com/yumindayu/leetcode-php

    [1,2,3,1]
     */
    public function massage($nums)
    {
        if (!$nums) {
            return 0;
        }

        $dp[0] = $nums[0];
        $max   = $dp[0];
        for ($i = 1; $i < count($nums); $i++) {
            $dp[$i] = $nums[$i];
            for ($j = 0; $j < $i - 1; $j++) {
                $dp[$i] = max($dp[$i], $dp[$j] + $nums[$i]);
            }
            $max = max($max, $dp[$i]);
        }
        return $max;
    }
}
