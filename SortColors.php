<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL

      输入: 
      输出: [0,0,1,1,2,2]
     */
    function sortColors(&$nums) {
      $left = 0;
      $right = count($nums) - 1;
      for ($i = 0; $i<= $right; $i++) {
        if ($nums[$i] == 0) {
          $this->swap($nums, $i, $left);
          $left++;
        } else if ($nums[$i] == 2) {
          $this->swap($nums, $i, $right);
          $right--;
        }
      }
    }

    function swap(&$nums, $i, $j) {
      $tmp = $nums[$i];
      $nums[$i] = $nums[$j];
      $nums[$j] = $tmp;
    }
}