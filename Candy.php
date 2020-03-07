<?php
class Solution {

  /**
   * @param Integer[] $ratings
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   输入: [1,0,2]
   输出: 5
   解释: 你可以分别给这三个孩子分发 2、1、2 颗糖果。


   输入: [1,2,2]
   输出: 4
   解释: 你可以分别给这三个孩子分发 1、2、1 颗糖果。
     第三个孩子只得到 1 颗糖果，这已满足上述两个条件。
   
   */
  function candy($ratings) {
    $candy = [];
    for ($i = 0; $i < count($ratings); $i++) {
      $candy[$i] = 1;
    }
    for ($i = 1; $i < count($ratings); $i++) {
      if ($ratings[$i] > $ratings[$i - 1]) {
        $candy[$i] = $candy[$i - 1] + 1;
      }
    }
    for ($i = count($ratings) - 2; $i >= 0; $i--) {
      if ($ratings[$i] > $ratings[$i + 1] && $candy[$i] <= $candy[$i + 1]) {
        $candy[$i] = $candy[$i + 1] + 1;
      }
    }
    return array_sum($candy);
  }
}