<?php
class Solution {

  /**
   * @param Float $x
   * @param Integer $n
   * @return Float
   pow(2,10)

   2 2 2 2 2    2 2 2 2 2 
   */
  function myPow($x, $n) {
    if (!$n) {
      return 1;
    }
    if ($n < 0) {
      return 1 / $this->myPow($x, -$n);
    }
    if ($n % 2) {
      return $x * $this->myPow($x, $n - 1);
    }
    return $this->myPow($x * $x, $n / 2);
  }
}