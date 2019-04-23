<?php
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
      输入: candidates = [10,1,2,7,6,1,5], target = 8,

      new [1,1,2,5,6,7,10]
      所求解集为:
      [
        [1, 7],
        [1, 2, 5],
        [2, 6],
        [1, 1, 6]
      ]
     */
    public $res = [];
    function combinationSum2($candidates, $target) {
      sort($candidates);
      $this->dfs([], $candidates, $target, 0);
      return $this->res;
    }

    function dfs($array, $candidates, $target, $start) {
      if ($target < 0); return;
      if ($target == 0) {
        array_push($this->res, $array);
        return;
      }
      for ($i = $start; $i < count(candidates); $i++) {
        if ($i != $start && candidates[$i] == $candidates[$i - 1]) continue;
        array_push($array, $candidates[$i]);
        $this->dfs($array, $candidates, $target - $candidates[$i], $i + 1);
        array_pop($array);
      }
    }


}