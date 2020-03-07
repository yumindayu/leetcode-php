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

    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
        if ($board[$i][$j] == "O") {
          if ($i == 0 || $i == $m - 1 || $j == 0 || $j == $n - 1) {
            $this->union($i * $n + $j, $m * $n + 1);
          } else {
            //上下左右合并
            if ($board[$i - 1][$j] == 'O') {  //上
              $this->union(($i - 1) * $n + $j, $i * $n + $j);
            }
            if ($board[$i + 1][$j] == 'O') {
              $this->union(($i + 1) * $n + $j, $i * $n + $j);
            }
            if ($board[$i][$j - 1] == 'O') {
              $this->union($i * $n + $j - 1, $i * $n + $j);
            }
            if ($board[$i][$j + 1] == 'O') {
              $this->union($i * $n + $j + 1, $i * $n + $j);
            }
          }
        }
      }
    }

    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
        if ($board[$i][$j] == 'O' && $this->find($i * $n + $j) != $m * $n + 1) {
          $board[$i][$j] = 'X';
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