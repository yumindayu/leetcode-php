<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @param Integer $target
   * @return Integer[]  
   
   for i = 0

     for j= i + 1

    [3, 2, 4] 6

   */
  function twoSum($nums, $target) {
    $map = [];
    for ($i = 0; $i <= count($nums) - 1; $i++) {
      $diff = $target - $nums[$i];
      if (isset($map[$diff])) {
        return [$map[$diff], $i];
      }
      $map[$nums[$i]] = $i;
    }
    return [0, 0];
  }
}