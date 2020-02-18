<?php
class Solution {

  /**
   * @param String[][] $grid
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   $grid = [
      ["1","1","1","1","0"],
      ["1","1","0","1","0"],
      ["1","1","0","0","0"],
      ["0","0","0","0","0"],
   ];

   $grid = [
      ["1","1","0","0","0"], // 0,0 -> 0,0 
      ["1","1","0","0","0"], // 1,0 -> 0,0  1,1 -> 1,0
      ["0","0","1","0","0"], 
      ["0","0","0","1","1"],
   ];
   */
  public $root = [];

  public $sum = 0;
  function numIslands($grid) {
    $m = count($grid);
    $n = count($grid[0]);
    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
        if ($grid[$i][$j] == "1") {
          $this->root[$i * $n + $j] = $i * $n + $j;
          $this->sum++;
        }
      }
    }

    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
        if ($grid[$i][$j] == "1") {
          if ($j - 1 >=0 && $grid[$i][$j - 1] == "1") { //左边
            $this->union($i * $n + $j, $i * $n + $j - 1);
          }

          if ($i - 1 >=0 && $grid[$i - 1][$j] == "1") {
            $this->union($i * $n + $j, ($i - 1) * $n + $j);
          }
        }
      }
    }

    // foreach ($this->root as $key => $value) {
    //   if ($this->root[$key] == $key) {
    //     $this->sum++;
    //   }
    // }
    return $this->sum;
  }

  function union($p, $q) {
    $rootx = $this->find($p);
    $rooty = $this->find($q);
    if ($rootx == $rooty) return;

    $this->root[$p] = $q;
    $this->sum--;
    return; 
  }

  function find($x) {
    if ($this->root[$x] != $x) {
      $this->root[$x] = $this->find($this->root[$x]);
    }
    return $this->root[$x]; 
  }
}