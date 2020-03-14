<?php
class Solution {

  /**
   * @param Integer[] $nums
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php
   */

  public $LIS = [];
  function lengthOfLIS2($nums) { 
    for ($i = 0; $i < $nums; $i++) {
      $this->insertLIS($nums[$i]);
    }
    return count($this->LIS);
  }

  function insertLIS($num) {
    if (empty($this->LIS)) {
      array_push($this->LIS, $num);
      return;
    }
    $l = 0;
    $r = count($this->LIS) - 1;

    while ($l <= $r) {
      $mid = floor(($r - $l) / 2) + $l;
      if ($num == $this->LIS[$mid]) {
        return;
      }
      if ($num < $this->LIS[$mid]) {
        $r = $mid - 1;
      } else {
        $l = $mid + 1;
      }
      //此时 l 就是num应该在的位置
    }
    $this->LIS[$l] = $num;
  }



  function lengthOfLIS($nums) {
    $max = 1;
    for ($i = 0; $i < count($nums); $i++) {
      $dp[$i] = 1;
      for ($j = 0; $j < $i; $j++) {
        if ($num[$j] < $nums[$i]) {
          $dp[$i] = max($dp[$i], $dp[$j] + 1);
          $max = max($max, $dp[$i]);
        }
      }
    }
    return $max;
  }



}