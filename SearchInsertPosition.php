<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     输入: [1,3,5,6], 5
     输出: 2

     输入: [1,3,5,6], 2
     输出: 1

     输入: [1,3,5,6], 7
     输出: 4

     找出数组里第一个大于等于target的数字
     */
    function searchInsert($nums, $target) {
      $left = 0;
      $right = count($nums) - 1;
      $p = count($nums);
      while ($left <= $right) {
        $mid = floor(($right - $left) / 2) + $left;
        if ($nums[$mid] >= $target) {
          if ($mid == 0 || $nums[$mid - 1] < $target) {
            $p = $mid;
            break;
          } else {
            $right = $mid - 1;
          }
        } else {
          $left = $mid + 1;
        }
      }
      return $p;
    }
}

