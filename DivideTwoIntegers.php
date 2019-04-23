<?php
class Solution {

  /**
   * @param Integer $dividend
   * @param Integer $divisor
   * @return Integer
   两数相除
   要求不使用乘法、除法和 mod 运算符

   输入: dividend = 10, divisor = 3
   输出: 3


   */
  function divide($dividend, $divisor) {
    $sign = 1;
    if (($dividend < 0 && $divisor > 0) || ($dividend > 0 && $divisor < 0)) {
      $sign = -1;
    }
    $ldividend = abs($dividend);
    $ldivisor = abs($divisor);

    if ($ldividend < $ldivisor) return 0;

    $sum = $ldivisor;
    $multi = 1;
    while ($sum + $sum < $ldividend) {
      $sum += $sum;
      $multi += $multi;
    }
    $data = $multi + $this->divide($ldividend - $sum, $ldivisor);
    $num = $sign < 1 ? 0 - $data : $data;
    if ($num > pow(2, 31) -1) return pow(2, 31) -1;
    if ($num < pow(-2,31)) return pow(-2,31);
    return $num;
  }
}