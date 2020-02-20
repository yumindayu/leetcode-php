<?php
class Solution {

  /**
   * @param Integer[][] $triangle
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

    [
         [2],      [11]
        [3,4],    [9,10]
       [6,5,7], [7, 6, 10]
      [4,1,8,3]
    ]
    自顶向下的最小路径和为 11（即，2 + 3 + 5 + 1 = 11）。

    dp[i][j] //i,j 

    dp[i][j] = min(dp[i+1][j], dp[i+1][j+1]) + t[i][j]


   */
  function minimumTotal($triangle) {
    $dp = [];
    $array = $triangle[count($triangle) - 1];
    for ($i = 0; $i < count($array); $i++) {
      $dp[count($triangle) - 1][$i] = $array[$i];
    }
    for ($i = count($triangle) - 2; $i >= 0; $i--) {
      for ($j = 0; $j < count($triangle[$i]); $j++) {
        $dp[$i][$j] = min($dp[$i + 1][$j], $dp[$i + 1][$j + 1]) + $triangle[$i][$j];
      }
    }
    return $dp[0][0];
  }

  function minimunTotal2($triangle) {
    $pre = $triangle[count($triangle) - 1];
    for ($i = count($triangle) - 2; $i >= 0; $i--) { 
      $current = [];
      for ($j = 0; $j < count($triangle[$i]); $i++) {
        array_push($current, min($dp[$j], $dp[$j + 1]) + $triangle[$i][$j]);
      }
      $pre = $current;
    }
    return $pre[0];
  }
}