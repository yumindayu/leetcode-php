<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]
    输入: nums = [1,2,3]
    输出:
    [
      [3],
      [1],
      [2],
      [1,2,3],
      [1,3],
      [2,3],
      [1,2],
      []
    ]
   */
  public $res = [];
  function subsets($nums) {
    if (!$nums) return [];
    $this->do([], $nums, 0);
    return $this->res;
  }

  function do($array, $nums, $start) {
    array_push($this->res, $array);
    for ($i = $start; $i < count($nums); $i++) {
      array_push($array, $nums[$i]);
      $this->do($array, $nums, $i + 1);
      array_pop($array);
    }
  }
}