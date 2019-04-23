<?php
class Solution {

  /**
   * @param String $str
   * @return Integer
   字符串转换整数 (atoi)

   输入: "42"
   输出: 42

   输入: "   -42"
   输出: -42

   输入: "4193 with words"
   输出: 4193

   输入: "words and 987"   "+567"
   输出: 0

   输入: "-91283472332"
   输出: -2147483648
   */
  function myAtoi($str) {
    if (!$str) return 0;

    $str = trim($str);
    $first = $str[0];
    $sign = 1; //正整数
    $res = 0;
    if ($first == "+") {
      $start = 1;
    } else if ($first == "-") {
      $start = 1;
      $sign = -1; //负整数
    } else {
      $start = 0;
    }
    for ($i = $start; $i < strlen($str); $i++) {
      if (!is_numeric($str[$i])) {
        return $res * $sign;
      }

      $res = $res * 10 + $str[$i];
      if ($res >= Pow(2, 31)) {
        if ($sign > 0) {
          return Pow(2, 31) - 1 * $sign;
        }
        return Pow(2, 31) * $sign;
      }
    }
    return $res * $sign;
  }
}