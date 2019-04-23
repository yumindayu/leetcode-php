<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    public $cols = [];
    public $pie = [];
    public $na = [];
    public $res = [];
    function totalNQueens($n) {
      $this->solve([], $n, 0);
      return count($this->res);
    }

    function solve($answer, $n, $i) {
      if ($i == $n) {
        array_push($this->res, $answer);
        return;
      }
      for ($j = 0; $j < $n; $j++) {
        if (in_array($j, $this->cols) || in_array($i + $j, $this->pie) || in_array($i - $j + $n, $this->na)) {
          continue;
        }
        array_push($this->cols, $j);
        array_push($this->pie, $i + $j);
        array_push($this->na, $i - $j + $n);

        $answer[$i] = $j;
        $this->solve($answer, $n, $i + 1);

        array_pop($this->cols);
        array_pop($this->pie);
        array_pop($this->na);
      }
    }
    
}