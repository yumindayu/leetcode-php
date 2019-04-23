<?php
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer

     1. dp[i,j] 到i，j坐标一共多少种走法
     2. dp[i][j] = dp[i][j+1] + dp[i + 1][j]
     */
    function uniquePaths($m, $n) {
      $dp = [];
      for ($i = $n - 1; $i >= 0; $i--) {
        for ($j = $m - 1; $j >= 0; $j--) {
          if ($i == $n - 1 || $j == $m - 1) {
            $dp[$i][$j] = 1;
          } else {
            $dp[$i][$j] = $dp[$i][$j + 1] + $dp[$i + 1][$j];
          }
        }
      }
      return $dp[0][0];
    }
}