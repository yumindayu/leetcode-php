<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Solution
{
    public function minimumTotal($triangle)
    {
        $dp = end($triangle);
        for ($i = count($triangle) - 2; $i >= 0; $i--) {
            for ($j = 0; $j < count($triangle[$i]); $j++) {
                $dp[$j] = min($dp[$j], $dp[$j + 1]) + $triangle[$i][$j];
            }
        }
        return $dp[0];
    }
}
