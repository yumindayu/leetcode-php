<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function maxCoins($nums)
    {
        $n = count($nums);
        array_unshift($nums, 1);
        array_push($nums, 1);

        $dp = [];
        for ($i = 0; $i < $n + 2; $i++) {
            for ($j = $i + 1; $j < $n + 2; $j++) {
                $dp[$i][$j] = 0;
            }
        }
        for ($i = $n; $i >= 0; $i--) {
            for ($j = $i + 1; $j < $n + 2; $j++) {
                for ($k = $i + 1; $k < $j; $k++) {
                    $dp[$i][$j] = max($dp[$i][$j], $dp[$i][$k] + $dp[$k][$j] + $nums[$i] * $nums[$j] * $nums[$k]);
                }
            }
        }
        return $dp[0][$n + 1];
    }
}
