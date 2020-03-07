<?php
class Solution {
  /**
   * @param Integer $target
   * @return Interger[][]
   * @github https://github.com/yumindayu/leetcode-php

   target = 9
   [[2,3,4],[4,5]]

   1  2  3  4  5  6  7  8

            [      ]

   */
  public $res = [];

  function findContinuousSequence($target) {
    for ($i = 1; $i < $target; $i++) {
      $this->helper([], $i, $target, 0);
    }
    return $this->res;
  }

  function helper($array, $start, $target, $sum) {
    if ($sum == $target) {
      array_push($this->res, $array);
      return;
    }
    if ($sum > $target) {
      return false;
    }
    array_push($array, $start);
    $this->helper($array, $start + 1, $target, $sum + $start);
  }

  function findContinuousSequence2($target) {
    $res = [];
    $sum = 0;
    $window = [];

    for ($i = 1; $i < $target; $i++) {
      $sum += $i;
      array_push($window, $i);
      if ($sum < $target) {
        continue;
      } else if ($sum > $target) {
        while ($sum > $target) {
          $first = array_shift($window);
          $sum -= $first;
          if ($sum == $target) {
            array_push($res, $window);
            break;
          }
        }

      } else {
        array_push($res, $window);
      }
    }
    return $res;
  }

}