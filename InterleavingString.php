<?php
class Solution {

  /**
   * @param String $s1
   * @param String $s2
   * @param String $s3
   * @return Boolean
   * @github https://github.com/yumindayu/leetcode-php


   输入: s1 = "aabcc", s2 = "dbbca", s3 = "aadbbcbcac"

   aa 
      dbbc
          bc
             a
               c
   输出: true

   dp[i][j] 表示s1的前i个字符到s2的前j个字符是否是s3的前i+j个字符

   dp[i][j] = dp[i-1][j] && s1[i-1]==s3[i-1+j] or
              dp[i][j-1] && s2[j-1]==s3[j-1+i]
   */
  function isInterleave($s1, $s2, $s3) {
    $m = strlen($s1);
    $n = strlen($s2);
    if ($m + $n != strlen($s3)) return false;
    $dp = [];
    $dp[0][0] = true;
    for ($i = 1; $i <= $m; $i++) {
      $dp[$i][0] = $dp[$i - 1][0] && $s1[$i - 1] == $s3[$i - 1];
    }
    for ($i = 1; $i <= $n; $i++) {
      $dp[0][$i] = $dp[0][$i - 1] && $s2[$i - 1] == $s3[$i - 1];
    }
    for ($i = 1; $i <= $m; $i++) {
      for ($j = 1; $j <= $n; $j++) {
        $dp[$i][$j] = ($dp[$i - 1][$j] && $s1[$i - 1] == $s3[$i - 1 + $j]) || ($dp[$i][$j - 1] && $s2[$j - 1] == $s3[$j - 1 + $i]);
      }
    }
    return $dp[$m][$n];
  }
}