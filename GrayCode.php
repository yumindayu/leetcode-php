<?php
class Solution {

  /**
   * @param Integer $n
   * @return Integer[]
   */
  function grayCode($n) {
    $res = [];
    for ($i = 0; $i < 1 << $n; $i++) {
      array_push($res, $i ^ $i >> 1);
    }
    return $res;
  }
}