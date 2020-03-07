<?php
class Solution {

  /**
   * @param Integer[][] $dungeon
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   --------------
   -2  | -3  | 3 |
   ----|-----|---|
   -5  | -10 | 1 |
   ----|-----|---|
   10  | 30  |-5 | (P) 6
   ----|-----|---|

   dp[i,j] //到i,j这个坐标之前需要的最低点数   1 


   */
  function calculateMinimumHP($dungeon) {
    $m = count($dungeon) - 1;
    $n = count($dungeon[0] - 1);

    $dp[$m][$n] = max(1, 1 - $dungeon[$m][$n]); 

    for ($i = $m - 1; $i >= 0; $i--) {
      $dp[$i][$n] = max(1, $dp[$i + 1][$n] = $dungeon[$i][$n]);
    }

    for ($i = $n - 1; $i >= 0; $i--) {
      $dp[$m][$i] = max(1, $dp[$m][$i + 1] - $dungeon[$m][$i]);
    }

    for ($i = $m - 1; $i >= 0; $i--) {
      for ($j = $n - 1; $j >= 0; $j--) {
        $dp[$i][$j] = max(1, min($dp[$i + 1][$j], $dp[$i][$j + 1]) - $dungeon[$i][$j]);
      }
    }
    return $dp[0][0];
  }
}