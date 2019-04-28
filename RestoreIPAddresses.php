<?php
class Solution {

  /**
   * @param String $s
   * @return String[]
   * @github https://github.com/yumindayu/leetcode-php

   输入: "25525511135"
   输出: ["255.255.11.135", "255.255.111.35"]
   */
  public $res = [];

  function restoreIpAddresses($s) {
    if (strlen($s) > 12) return $this->res;
    $this->restore($s, 4, "");
    return $this->res;
  }

  function restore($s, $k, $ip_string) {
    if ($k == 0 && strlen($s) == 0) {
      array_push($this->res, $ip_string);
      return;
    }
    for ($i = 1; $i <= 3; $i++) {
      if (strlen($s) >= $i && $this->valid(substr($s, 0, $i))) {
        if ($k == 1) {
          $this->restore(substr($s, $i), $k - 1, $ip_string . substr($s, 0, $i));
        } else {
          $this->restore(substr($s, $i), $k - 1, $ip_string . substr($s, 0, $i) . ".");
        }
      }
    }
  }

  function valid($s) {
    if ($s == "" || (strlen($s) > 1 && $s[0] == "0")) return false;
    return $s >= 0 && $s <= 255;
  }

}