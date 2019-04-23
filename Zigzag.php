<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String

     将一个给定字符串根据给定的行数，以从上往下、从左到右进行 Z 字形排列。

      比如输入字符串为 "LEETCODEISHIRING" 行数为 3 时，排列如下：

      L   C   I   R
      E T O E S I I G
      E   D   H   N

     */
    function convert($s, $numRows) {
      if (strlen($s) <= 1 || $numRows == 1) return $s;

      $ret = [];
      $pre = -1;
      $sign = "down";
      for ($i = 0; $i < strlen($s); $i++) {
        if ($sign == "up") {
          $ret[$pre - 1][] = $s[$i];
          $pre = $pre - 1;
          if ($pre == 0) {
            $sign = "down";
          }
        } else {
          $ret[$pre + 1][] = $s[$i];
          $pre = $pre + 1;
          if ($pre == $numRows - 1) {
            $sign = "up";
          }
        }
      }
      return implode('', array_map(function($a){return implode('', $a);}, $ret));
    }

    function convert2($s, $numRows) {
      if (strlen($s) <= 1 || $numRows == 1) return $s;

      $ret = [];
      for ($i = 0; $i < strlen($s); $i++) {
        $index = $i % (2 * $numRows - 2);
        $index = $index < $numRows ? $index : 2 * $numRows - 2 - $index;
        $ret[$index][] = $s[$i];
      }
      return implode('', array_map(function($a){return implode('', $a);}, $ret));
    }
}