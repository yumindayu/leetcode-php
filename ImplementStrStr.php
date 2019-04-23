<?php
class Solution {

  /**
   * @param String $haystack
   * @param String $needle
   * @return Integer
   实现strStr()

   输入: haystack = "hello", needle = "ll"
   输出: 2
   */
  function strStr($haystack, $needle) {
    for ($i = 0; $i <= strlen($haystack) - strlen($needle); $i++) {
      $str = substr($haystack, $i, strlen($needle));
      if ($str == $needle) {
        return $i;
      }
    }
    return -1;
  }
}