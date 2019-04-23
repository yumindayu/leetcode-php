<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @param Integer $target
   * @return Integer[]

   输入: nums = [5,7,7,8,8,10], target = 8
   输出: [3,4]
   你的算法时间复杂度必须是 O(log n) 级别。

   */
  function searchRange($nums, $target) {
    $left = 0;
    $right = count($nums) - 1;
    $result = [-1, -1];
    while ($left <= $right) {
      $mid = floor(($right - $left) / 2) + $left;
      if ($nums[$mid] == $target) {
        while ($mid >= $left && $nums[$mid] == $target) {
          $mid--;
        }
        $result[0] = $mid + 1;
        $mid = floor(($right - $left) / 2) + $left;
        while ($mid <= $right && $nums[$mid] == $target) {
          $mid++;
        }
        result[1] = $mid - 1;
        break;
      } else if ($nums[$mid] > $target) {
        $right = $mid - 1;
      } else {
        $left = $mid + 1;
      }
    }
  }
}