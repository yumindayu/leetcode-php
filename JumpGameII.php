<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer

     输入: [2,3,1,1,4]
     输出: 2
      
    2     3     1     1      4
               can
    i=0   max=2
    i=1   step=1 can_arrived=2  max=4
    i=2   max=4
    i=3   step=2 can_arrived=4
    i=4   max=8

     */
    function jump($nums) {
      $step = 0;
      $can_arrived = 0;
      $max = 0;
      for ($i = 0; $i < count($nums); $i++) {
        if ($can_arrived < $i) {
          $step++;
          $can_arrived = $max;
        }
        $max = max($max, $i + $nums[$i]);
      }
      return $step;
    }
}