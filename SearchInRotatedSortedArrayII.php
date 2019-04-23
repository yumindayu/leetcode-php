<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean

     输入: nums = [2,5,6,0,0,1,2], target = 0
     输出: true
     */
    function search($nums, $target) {
      $low = 0;
      $high = count($nums) - 1;
      while ($low <= $high) {
        $mid = $low + floor(($high - $low) / 2);
        if ($nums[$mid] == $target) {
          return true;
        }

        if ($nums[$low] < $nums[$mid]) { //左半部分是有序的
          if ($nums[$mid] >= $target && $target >= $nums[$low]) {
            $high = $mid - 1;
          } else {
            $low = $mid + 1;
          }
        } else if ($nums[$high] > $nums[$mid]) { //右半部分是有序的
          if ($nums[$mid] <= $target && $target <= $nums[$high]) {
            $low = $mid + 1;
          } else {
            $high = $mid - 1;
          }
        } else {
          if ($nums[$mid] == $nums[$low]) {
            $low++;
          } else {
            $high--;
          }
        }
      }
      return false;
    }
}