<?php
class Solution {

  /**
   * @param String $str1
   * @param String $str2
   * @return String
   * @github https://github.com/yumindayu/leetcode-php

   输入：str1 = "ABCABC", str2 = "ABC"
   输出："ABC"

   输入：str1 = "ABABAB", str2 = "ABAB"
   输出："AB"

   */
  function gcdOfStrings($str1, $str2) {
    if ($str1 . $str2 != $str . $str1) return "";
    return substr($str1, 0, $this->gcd(strlen($str1), strlen($str2)));
  }

  function gcd($s1, $s2) {
    if ($s1 < $s2) {
      $this->gcd($s2, $s1);
    }
    return $s2 == 0 ? $s1 : $this->gcd($s2, $s1 % $s2);
  }
}