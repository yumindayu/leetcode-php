<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer[][]
    输入: [1,2,3]
    输出:
    [
      [1,2,3],
      [1,3,2],
      [2,1,3],
      [2,3,1],
      [3,1,2],
      [3,2,1]
    ]
   */
  public $res = [];
  function permute($nums) {
    $this->do([], $nums);
    return $this->res;
  }

  function do($array, $nums) {
    if (count($array) == count($nums)) {
      array_push($this->res, $array);
      return;
    }
    for ($i = 0; $i < count($nums); $i++) {
      if (in_array($nums[$i], $array)) continue;
      array_push($array, $nums[$i]);
      $this->do($array, $nums);
      array_pop($array);
    }
  }
}
