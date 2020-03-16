<?php
class Solution {

  /**
   * @param String $S
   * @return String
   * @github https://github.com/yumindayu/leetcode-php

    输入："aabcccccaaa"
    输出："a2b1c5a3"
   */
  function compressString($S) {
    if (!$S) return $S;
    $length = strlen($S);
    $str = $S[0];
    $count = 1;
    $new_str .= $str;
    for ($i = 1; $i < $length; $i++) {
      if ($S[$i] == $str) {
        $count++;
      } else {
        $new_str .= $count;
        $str = $S[$i];
        $count = 1;
        $new_str .= $str;
      }
    }
    $new_str .= $count;
    return strlen($new_str) >= $length : $S : $new_str;
  }
}