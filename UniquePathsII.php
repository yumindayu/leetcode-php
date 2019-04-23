<?php
class Solution {

  /**
   * @param Integer[][] $obstacleGrid
   * @return Integer
   */
  function uniquePathsWithObstacles($obstacleGrid) {
    $m = count($obstacleGrid);
    $n = count($obstacleGrid[0]);
    $dp = [];
    if ($obstacleGrid[$m - 1][$n - 1] == 1) return 0;
    $dp[$m -1][$n - 1] = 1;
    for ($i = $m - 1; $i >= 0; $i--) {
      for ($j = $n - 1; $j >= 0;  $j--) {
        if ($obstacleGrid[$i][$j] == 1) {
          $dp[$i][$j] = 0;
        } else {
          if ($i != $m - 1 || $j != $n - 1) {
            if (isset($dp[$i][$j + 1]) && isset($dp[$i + 1][$j])) {
              $dp[$i][$j] = $dp[$i][$j + 1] + $dp[$i + 1][$j];
            } else if (isset($dp[$i][$j + 1])) {
              $dp[$i][$j] = $dp[$i][$j + 1];
            } else {
              $dp[$i][$j] = $dp[$i + 1][$j];
            }
          }
        }
      }
    }
    return $dp[0][0];
  }
}