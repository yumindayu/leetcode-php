<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]

   nums = [-1, 0, 1, 2, -1, -4]，
   [
    [-1, 0, 1],
    [-1, -1, 2]
   ]

   [-4, -1, -1, 0, 1, 2]

   */
  function threeSum($nums) {
    if (!$nums) return [];
    sort($nums);
    $ret = [];
    for ($i = 0; $i < count($nums) - 2; $i++) {
      if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;
      $left = $i + 1;
      $right = count($nums) - 1;

      $need = 0 - $nums[$i];

      while ($left < $right) {
        if ($nums[$left] + $nums[$right] == $need) {
          array_push($ret, [$nums[$i], $nums[$left], $nums[$right]]);
          while ($left < $right && $nums[$left] == $nums[$left + 1]) $left++;
          while ($left < $right && $nums[$right] == $nums[$right - 1]) $right--;
          $left++;
          $right--;
        } else if ($nums[$left] + $nums[$right] > $need) {
          $right--;
        } else {
          $left++;
        }
      }
    }
    return $ret;
  }
}