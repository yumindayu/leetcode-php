<?php
class Solution {

  /**
   * @param Integer $x
   * @return Integer
   输入: 123
   输出: 321

   输入: 120
   输出: 21

   假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−2^31,  2^31 − 1]。请根据这个假设，如果反转后整数溢出那么就返回 0。
   */
  function reverse($x) {
    $res = 0;
    while ($x != 0) {
      $res = floor($res * 10 + $x % 10);
      if ($x < 0) {
        $x = ceil($x / 10);
      } else {
        $x = floor($x / 10);
      }
      if ($res > Pow(2, 31) - 1 || $res < - Pow(2, 31) -1) return 0;
    }
    return $res;
  }
}