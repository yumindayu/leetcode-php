<?php
class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board) {
      if (!$board) return;
      $this->solve($board);
    }

    function solve(&board) {
      for ($i = 0; $i < count($board); $i++) {
        for ($j = 0; $j < count($board[0]); $j++) {
          if ($board[$i][$j] == ".") {
            for ($c = "1"; $c <= "9"; $c++) {
              if ($this->valid($board, $i, $j, $c)) {
                $board[$i][$j] = (string)$c;
                if ($this->solve($board)) {
                  return true;
                }
                $board[$i][$j] = ".";
              }
            }
            return false;
          }
        }
      }
      return true;
    }

    function valid($board, $row, $col, $c) {
      for ($i = 0; $i < 9; $i++) {
        if ($board[$i][$col] != "." && $board[$i][$col] = $c) return false;
        if ($board[$row][$i] != "." && $board[$row][$i] = $c) return false;

        $x = 3 * floor($row / 3) + floor($i / 3);
        $y = 3 * floor($col / 3) + floor($i % 3);
        if ($board[$x][$y] != "." && $board[$x][$y] == $c) return false;
      }
      return true;
    }
}