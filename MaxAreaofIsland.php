<?php
class Solution {

  /**
   * @param Integer[][] $grid
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   [
     [0,0,1,0,0,0,0,1,0,0,0,0,0],
     [0,0,0,0,0,0,0,1,1,1,0,0,0],
     [0,1,1,0,1,0,0,0,0,0,0,0,0],
     [0,1,0,0,1,1,0,0,1,0,1,0,0],
   ]
  

   [0 => 0]  1 + 1 + 1
   [2 => 0]
   [3 => 2] 
   */

  public $visited = [];

  function maxAreaOfIsland($grid) {
    $m = count($grid);
    $n = count($grid[0]);
    $max = 0;
    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
        if ($grid[$i][$j] == "1" && !isset($this->visited[$i * $n + $j])) {
          $sum = $this->_dfs($grid, $i, $j, $m, $n);
          $max = max($max, $sum);
        }
      }
    }
    return $max;
  }

  function _dfs($gird, $row, $col, $m, $n) {
    if ($row < 0 || $row >= $m || $col < 0 || $col >= $n) {
      return 0;
    }
    if ($grid[$row][$col] == "0") {
      return 0;
    }
    $sum = 0;
    if (!isset($this->visited[$row * $n + $col])) {
      $sum = 1;
      $this->visited[$row * $n + $col] = 1;
      $sum += $this->_dfs($grid, $row + 1, $col, $m, $n);
      $sum += $this->_dfs($grid, $row, $col + 1, $m, $n);
      $sum += $this->_dfs($grid, $row - 1, $col, $m, $n);
      $sum += $this->_dfs($grid, $row, $col - 1, $m, $n);
    }
    return $sum;
  }
}