<?php
class Solution {

  /**
   * @param Integer[][] $grid
   * @return Integer
    输入:
    [
      [1,3,1],
      [1,5,1],
      [4,2,1]
    ]
    输出: 7
    解释: 因为路径 1→3→1→1→1 的总和最小。
   */
  function minPathSum($grid) {
    $m = count($grid);
    $n = count($grid[0]);
    $dp = [];
    $dp[0][0] = $grid[0][0];
    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
        if (isset($dp[$i][$j -1 ]) && isset($dp[$i - 1][$j])) {
          $dp[$i][$j] = min($dp[$i][$j - 1], $dp[$i - 1][$j]) + $grid[$i][$j];
        } else if (isset($dp[$i][$j - 1])) {
          $dp[$i][$j] = $dp[$i][$j - 1] + $grid[$i][$j];
        } else {
          $dp[$i][$j] = $dp[$i - 1][$j] + $grid[$i][$j];
        }
      }
    }
    return $dp[$m - 1][$n - 1];
  }
}