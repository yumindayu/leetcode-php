<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     输入: 121
     输出: true

     输入: -121
     输出: false

     输入: 10
     
     输出: false
     */
    function isPalindrome($x) {
      if ($x < 0 || ($x != 0 && $x % 10 == 0)) return false;

      $source = $x;
      $rev = 0;
      while ($x != 0) {
        $rev = $rev * 10 + $x % 10;
        $x = floor($x / 10);
      }
      return $source == $rev ? true : false;
    }
}