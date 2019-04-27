<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]

    输入: [1,2,2]
    输出:
    [
      [2],
      [1],
      [1,2,2],
      [2,2],
      [1,2],
      []
    ]
   */
  public $res = [];
  function subsetsWithDup($nums) {
    sort($nums);
    $this->do([], $nums, 0);
    return $this->res;
  }

  function do($array, $nums, $start) {
    array_push($this->res, $array);
    for ($i = $start; $i < count($nums); $i++) {
      if ($i != $start && $nums[$i] == $nums[$i - 1]) {
        continue;
      }
      array_push($array, $nums[$i]);
      $this->do($array, $nums, $i + 1);
      array_pop($array);
    }
  }
}