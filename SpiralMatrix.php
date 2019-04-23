<?php
class Solution {

  /**
   * @param Integer[][] $matrix
   * @return Integer[]
   输入:
    [
      [1, 2, 3, 4],
      [5, 6, 7, 8],
      [9,10,11,12],
      [13,14,15,16],
    ]
   输出: [1,2,3,4,8,12,16,15,14,13,9,5,6,7,11,10]
   */
  function spiralOrder($matrix) {
    $ret = [];
    if (count($matrix) == 0 || count($matrix[0]) == 0) return $ret;
    $top = 0;
    $bottom = count($matrix) - 1;
    $left = 0;
    $right = count($matrix[0]) - 1;

    while (true) {
      //from left to right
      for ($i = $left; $i <= $right; $i++) {
        array_push($ret, $matrix[$top][$i]);
      }
      $top++;
      if ($left > $right || $top > $bottom) break;

      //from top to bottom
      for ($i = $top; $i <= $bottom; $i++) {
        array_push($ret, $matrix[$i][$right]);
      }
      $right--;
      if ($left > $right || $top > $bottom) break;

      //from right to left
      for ($i = $right; $i >= $left; $i--) {
        array_push($ret, $matrix[$bottom][$i]);
      }
      $bottom--;
      if ($left > $right || $top > $bottom) break;

      //from bottom to top
      for ($i = $bottom; $i >= $top; $i--) {
        array_push($ret, $matrix[$i][$left]);
      }
      $left++;
      if ($left > $right || $top > $bottom) break;
    }
    return $ret;
  }
}