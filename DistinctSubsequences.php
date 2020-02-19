<?php
class Solution {

  /**
   * @param String $s
   * @param String $t
   * @return Integer
   * @github https://github.com/yumindayu/leetcode-php


    Input: S = "rabbbit", T = "rabbit"
    Output: 3

    rabb(b)it
    rab(b)bit
    ra(b)bbit

    dp[i][j] 字符串s的前i个字符 到字符串t的前j个字符的数量 

    s[i] == t[j]  dp[i][j] = dp[i-1][j-1] + dp[i - 1][j]
    s[i] != t[j]  dp[i][j] = dp[i - 1][j]

 s   r a b b b i t
 t   r a b b i t
   */
  function numDistinct($s, $t) {
    $dp = [];
    for ($i = 0; $i <= strlen($s); $i++) {
      $dp[$i][0] = 1;
    }
    for ($i = 1; $i <= strlen($t); $i++) {
      $dp[0][$i] = 0;
    }
    for ($i = 1; $i <= strlen($s); $i++) {
      for ($j == 1; $j <= strlen($t); $j++) {
        if ($s[$i] == $t[$j]) {
          $dp[$i][$j] = $dp[$i - 1][$j - 1] + $dp[$i - 1][$j];
        } else {
          $dp[$i][$j] = $dp[$i - 1][$j];
        }
      }
    }
    return $dp[strlen($s)][strlen($t)];
  }
}