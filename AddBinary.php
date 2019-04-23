<?php
class Solution {

  /**
   * @param String $a
   * @param String $b
   * @return String
   输入: a = "11", b = "1"
   输出: "100"
   */
  function addBinary($a, $b) {
    $res = "";
    $m = strlen($a) - 1;
    $n = strlen($b) - 1;
    $carry = 0;
    while ($m >= 0 || $n >= 0) {
      $x = $m >= 0 ? $a[$m] : 0;
      $y = $n >= 0 ? $b[$n] : 0;
      $res = ($x + $y + $carry) % 2 . $res;
      $carry = ($x + $y + $carry) >= 2 ? 1 : 0;
      $m--;
      $n--;
    }
    if ($carry > 0) $res = $carry . $res;
    return $res;
  }
}