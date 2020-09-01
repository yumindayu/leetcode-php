<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public function PredictTheWinner($nums)
    {
        $n = count($nums);
        if ($n % 2 == 0) {
            return true;
        }
        //偶数时先手一定赢
        $dp = [];
        for ($i = 0; $i < $n; $i++) {
            $dp[$i][$i] = $nums[$i];
        }
        for ($i = $n - 2; $i >= 0; $i--) {
            for ($j = $i + 1; $j < $n; $j++) {
                $dp[$i][$j] = max($nums[$i] - $dp[$i + 1][$j], $nums[$j] - $dp[$i][$j - 1]);
            }
        }
        return $dp[0][$n - 1] >= 0;
    }
}
