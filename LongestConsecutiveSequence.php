<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php
   
  O(n)时间复杂度

   输入: [100, 4, 200, 1, 3, 2, 1]
   输出: 4
   解释: 最长连续序列是 [1, 2, 3, 4]。它的长度为 4。
  
   100 -> 1 
   4 -> 4
   200 -> 1
   1 -> 4
   3 -> 2 
   2 -> left_length 1  right_length 2  1 + 1 + 2 = 4

   2 + right_length 

   */
  function longestConsecutive($nums) {
    if (!$nums) return 0;
    $array = [];
    $max = 1;
    for ($i = 0; $i < count($nums); $i++) {
      if (!isset($array[$nums[$i]])) {
        $left_length = 0;
        $right_length = 0;
        if (isset($array[$nums[$i] - 1])) {
          $left_length = $array[$nums[$i] - 1];
        } 
        if (isset($array[$nums[$i] + 1])) {
          $right_length = $array[$nums[$i] + 1];
        } 
        $cur_length = $left_length + $right_length + 1;
        $max = max($max, $cur_length);
        $array[$nums[$i]] = $cur_length;
        if (isset($array[$nums[$i] - $left_length])) {
          $array[$nums[$i] - $left_length] = $cur_length;
        }
        if (isset($array[$nums[$i] + $right_length])) {
          $array[$nums[$i] + $right_length] = $cur_length;
        }
      }
    }
    return $max;
  }
}