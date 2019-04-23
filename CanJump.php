<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     输入: [2,3,1,1,4]
     输出: true

     输入: [3,2,1,0,4]
     输出: false
     */
    function canJump($nums) {
      $max = 0;
      foreach ($nums as $k => $v) {
        if ($k > $max) return false;
        $max = max($max, $k + $v);
      }
      return true;
    }
}