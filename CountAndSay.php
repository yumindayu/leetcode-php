<?php
class Solution {

  /**
   * @param Integer $n
   * @return String
    1.     1
    2.     11
    3.     21
    4.     1211
    5.     111221
   */
  function countAndSay($n) {
    $res = "1";
    for ($i = 2; $i <= $n; $i++) {
      $repeat_count = 1;
      $str = "";
      for ($j = 0; $j < strlen($res); $j++) {
        if (isset($res[$j + 1]) && $res[$j] == $res[$j + 1]) {
          $repeat_count++;
        } else {
          $str .= $repeat_count . $res[$j];
          $repeat_count = 1;
        }
      }
      $res = $str;
    }
    return $res;
  }
}