<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php

   输入: [3,2,3]
   输出: 3

   输入: [2,2,1,1,1,2,2]
   输出: 2

num     2
count   1
   */
  function majorityElement($nums) {
    $start = $nums[0];
    $count = 1;

    for ($i = 1; $i < count($nums); $i++) {
      if ($nums[$i] == $start) {
        $count++;
      } else {
        $count--;
        if ($count == 0) {
          $start = $nums[$i + 1];
          $count = 1;
          $i++;
        }
      }
    }
    return $start;
  }
}