<?php
class Solution {

  /**
   * @param Integer[] $prices
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   输入: [7,1,5,3,6,4] 
   输出: 5

   */
  function maxProfit($prices) {
    $max = 0;
    $min = PHP_INT_MAX;

    for ($i = 0; $i < count($prices); $i++) {
      $min = min($min, $prices[$i]);
      $max = max($max, $prices[$i] - $min);
    }
    return $max;
  }
}