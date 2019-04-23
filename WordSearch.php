<?php
class Solution {

  /**
   * @param String[][] $board
   * @param String $word
   * @return Boolean
   board =
    [
      ['A','B','C','E'],
      ['S','F','C','S'],
      ['A','D','E','E']
    ]
    给定 word = "ABCCED", 返回 true.
    给定 word = "SEE", 返回 true.
    给定 word = "ABCB", 返回 false.
   */
  function exist($board, $word) {
    for ($i = 0; $i < count($board); $i++) {
      for ($j = 0; $j < count($board[0]); $j++) {
        $res = $this->helper($board, $i, $j, $word, 0);
        if ($res) return true;
      }
    }
    return false;
  }

  function helper($board, $i, $j, $word, $start) {
    if ($start >= strlen($word)) {
      return true;
    }
    if ($i < 0 || $i >= count($board) || $j < 0 || $j >= count($board[0]) || $board[$i][$j] != $word[$start]) {
      return false;
    }
    $c = $word[$start];
    $board[$i][$j] = "#";
    $res =  ($this->helper($board, $i + 1, $j, $word, $start + 1) ||
      $this->helper($board, $i - 1, $j, $word, $start + 1) ||
      $this->helper($board, $i, $j + 1, $word, $start + 1) ||
      $this->helper($board, $i, $j - 1, $word, $start + 1)
    );
    $board[$i][$j] = $c;
    return $res;
  }
}