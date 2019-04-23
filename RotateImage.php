<?php
class Solution {

  /**
   * @param Integer[][] $matrix
   * @return NULL
   给定 matrix = 
    [
      [1,2,3],
      [4,5,6],
      [7,8,9]
    ],

    1.上下交换
    2.以右斜线为轴交换

    原地旋转输入矩阵，使其变为:
    [
      [7,4,1],
      [8,5,2],
      [9,6,3]
    ]
   */
  function rotate(&$matrix) {
    $m = count($matrix);
    $n = count($matrix[0]);
    for ($i = 0; $i < floor($m / 2); $i++) {
      for ($j = 0; $j < $n; $j++) {
        $temp = $matrix[$i][$j];
        $matrix[$i][$j] = $matrix[$n - 1 - $i][$j];
        $matrix[$n - 1 - $i][$j] = $temp;
      }
    }
    for ($i = 0; $i < $m; $i++) {
      for ($j = $i; $j < $n; $j++) {
        $temp = $matrix[$i][$j];
        $matrix[$i][$j] = $matrix[$j][$i];
        $matrix[$j][$i] = $temp;
      }
    }
  }

  function $rotate2(&$matrix) {
    $n = count($matrix);
    for ($i = 0; $i < floor($n / 2); $i++) {
      for ($j = $i; $j < $n - 1 - $i; $j++) {
        $tmp = $matrix[$i][$j];
        $matrix[$i][$j] = $matrix[$n - $j - 1][$i];
        $matrix[$n - $j - 1][$i] = $matrix[$n - $i - 1][$n - $j - 1];
        $matrix[$n - $i - 1][$n - $j - 1] = $matrix[$j][$n - $i - 1];
        $matrix[$j][$n - $i - 1] = $tmp;
      }
    }
  }
}