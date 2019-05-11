<?php
class Solution {

  /**
   * @param Integer $n
   * @return Integer
   *
   * @github https://github.com/yumindayu/leetcode-php


   G(n) = f(1) + f(2) + f(3) .... + f(n)

   l:f(1...i-1) r:(i + 1.....n)

   G(n) = G(0)*G(n-1) + G(1)*G(n-2) ... + G(n-1)*G(0)
   */
  function numTrees($n) {
    $dp = [];
    $dp[0] = 1;
    for ($i = 1; $i <= $n; $i++) {
      for ($j = 0; $j < $i; $j++) {
        $dp[$i] += $dp[$j] * $dp[$i - $j - 1];
      }
    }
    return $dp[$n];
  }
}