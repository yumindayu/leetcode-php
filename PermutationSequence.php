<?php
class Solution {

  /**
   * @param Integer $n
   * @param Integer $k
   * @return String

    n = 4 k = 14

    [1,2,3,4] n! 4*3*2*1 = 24  
    1+(2,3,4) n-1! 6
    2+(1,3,4) n-1! 6
    3+(1,2,4) n-1! 6  ->   1+(2,4) 3-1! = 2
    4+(1,2,3) n-1! 6

    k从0开始，k=13
    k / n-1! 第一个index的位置
   */
  function getPermutation($n, $k) {
    $fact = 1;
    $nums = [];
    for ($i = 0; $i < $n; $i++) {
      $nums[$i] = $i + 1;
      $fact *= $i + 1;
    }
    $k -= 1;
    $res = "";
    for ($i = 0; $i < $n; $i++) {
      $fact = floor($fact / ($n - $i));
      $index = floor($k / $fact);
      $res .= (string)$nums[$index];
      $k %= $fact;
      unset($nums[$index]);
      $nums = array_values($nums);
    }
    return $res;
  }
}