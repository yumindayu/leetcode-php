<?php
class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
      for ($i = 0; $i < 9; $i++) {
        $rows = [];
        $cols = [];
        $cube = [];
        for ($j = 0; $j < 9; $j++) {
          if ($board[$i][$j] != "." && in_array($board[$i][$j], $rows)) {
            return false;
          } else {
            array_push($rows, $board[$i][$j]);
          }

          if ($board[$j][$i] != "." && in_array($board[$j][$i], $cols)) {
            return false;
          } else {
            array_push($cols, $board[$j][$i]);
          }

          $x = 3 * floor($i / 3) + floor($j / 3);
          $y = 3 * floor($i % 3) + floor($j % 3);
          if ($board[$x][$y] != "." && in_array($board[$x][$y], $cube)) {
            return false;
          } else {
            array_push($cube, $board[$x][$y]);
          }
        }
      }
      return true;
    }
}