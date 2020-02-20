<?php
class Solution {

  /**
   * @param String[][] $board
   * @return NULL
   * @github https://github.com/yumindayu/leetcode-php

   [
    ["X","X","X","X"],
    ["X","O","O","X"],
    ["X","X","O","X"],
    ["X","O","X","X"]
   ]
   */
  public $root = [];
  
  function solve(&$board) {
    $m = count($board);
    $n = count($board[0]);
    $this->root[$m * $n + 1] = $m * $n + 1;

    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
        if ($board[$i][$j] == "O") {
          $this->root[$i * $n + $j] = $i * $n + $j;
        }
      }
    }
  }

  function union($p, $q) {
    $rootp = $this->find($p);
    $rootq = $this->find($q);
    if ($rootp == $rootq) {
      return;
    }
    $rootp < $rootq ? $this->root[$rootp] = $rootq : $this->root[$rootq] = $rootp;
    return;
  }

  function find($x) {
    if ($this->root[$x] != $x) {
      $this->root[$x] = $this->find($this->root[$x]);
    }
    return $this->root[$x];
  }
}