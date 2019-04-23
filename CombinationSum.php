<?php
class Solution {

  /**
   * @param Integer[] $candidates
   * @param Integer $target
   * @return Integer[][]

    输入: candidates = [2,3,6,7], target = 7,
    所求解集为:
    [
      [7],
      [2,2,3]
    ]
  
   */
  public $res = [];
  function combinationSum($candidates, $target) {
    $this->dfs([], $candidates, $target, 0);
    return $this->res;
  }

  function dfs($array, $candidates, $target, $start) {
    if ($target < 0) return;
    if ($target == 0) {
      array_push($this->res, $array);
      return;
    }
    for ($i = $start; $i < count($candidates); $i++) {
      array_push($array, $candidates[$i]);
      $this->dfs($array, $candidates, $target - $candidates[$i], $i);
      array_pop($array);
    }
  }
}