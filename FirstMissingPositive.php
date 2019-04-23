<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     

     输入: [3,4,-1,1]
     输出: 2

     输入: [7,8,9,11,12]
     输出: 1

     */
    function firstMissingPositive($nums) {
      if (!$nums) return 1;

      for ($i = 0; $i < count($nums); $i++) {
        while ($nums[$i] > 0 && $nums[$nums[$i] - 1] != $nums[$i]) {
            $tmp = $nums[$nums[$i] - 1];
            $nums[$nums[$i] - 1] = $nums[$i];
            $nums[$i] = $tmp;
        }
      }
      for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] != $i + 1) {
            return $i + 1;
        }
      }
      return count($nums) + 1;
    }
}