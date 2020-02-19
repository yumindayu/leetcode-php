<?php
class Solution {

  /**
   * @param Integer $numRows
   * @return Integer[][]
   * @github https://github.com/yumindayu/leetcode-php

    Input: 5
    Output:
    [
         [1],
        [1,1],
       [1,2,1],
      [1,3,3,1],
     [1,4,6,4,1]
    ]
   */
  function generate($numRows) {
    $res = [];
    for ($i = 0; $i <$numRows; $i++) {
      if ($i == 0) {
        $res[$i] = [1];
      } else if ($i == 1) {
        $res[$i] = [1, 1];
      } else {
        $res[$i][0] = 1;
        for ($j = 1; $i < $i; $j++) {
          $res[$i][$j] = $res[$i - 1][$j - 1] + $res[$i - 1][$j];
        }
        $res[$i][$i] = 1;
      }
    }
    return $res;
  }

  function getRow($rowIndex) {
    for ($i = 0; $i <= $rowIndex; $i++) {
      if ($i == 0) {
        $pre = [1];
      } else if ($i == 1) {
        $pre = [1, 1];
      } else {
        $current = [];
        for ($j = 1; $j < $i; $j++) {
          array_push($current, $pre[$j - 1] + $pre[$j]);
        }
        array_unshift($current, 1);
        array_pop($current, 1);
        $pre = $current;
      }
    }
    return $pre;
  }
}