<?php
class Solution {

  /**
   * @param String[][] $grid
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   $grid = [
      ["1","1","0","0","0"], 
      ["1","1","0","0","0"],
      ["0","0","1","0","0"], 
      ["0","0","0","1","1"],
   ];
   */
  function numIslands(&$grid) {
    $m = count($grid) - 1;
    $n = count($grid[0]) - 1;
    $sum = 0;
    for ($i = 0; $i <= $m; $i++) {
      for ($j = 0; $j <= $n; $j++) {
        if ($grid[$i][$j] == "1") {
          $sum += $this->_floodfill($grid, $i, $j);
        }
      }
    }
  }

  function _floodfill(&$grid, $row, $col) {
    if ($row < 0 || $row >= count($grid) || $col < 0 || $col >= count($grid[0])) {
      return;
    }
    if ($grid[$row][$col] == "0") {
      return;
    }
    $grid[$i][$j] = "0";
    $this->_floodfill($grid, $row, $col + 1);
    $this->_floodfill($grid, $row + 1, $col);
    $this->_floodfill($grid, $row - 1, $col);
    $this->_floodfill($grid, $row, $col - 1);
    
    return 1;
  }
}