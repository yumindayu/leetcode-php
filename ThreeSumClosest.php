<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer

     最接近的三数之和
     nums = [-1，2，1，-4], 和 target = 1
     */
    function threeSumClosest($nums, $target) {
      if (!$nums) return [];

      sort($nums);
      $min = $nums[0] + $nums[1] + $nums[2];
      for ($i = 0; $i < count($nums) - 2; $i++) {
        $left = $i + 1;
        $right = count($nums) - 1;
        while ($left < $right) {
          $sum = $nums[$i] + $num[$left] + $nums[$right];
          if ($sum > $target) {
            $right--;
          } else {
            $left++;
          }
          if (abs($sum - $target) < abs($min - $target)) {
            $min = $sum;
          }
        }
      }
      return $min;
    }
}