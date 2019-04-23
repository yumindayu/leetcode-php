<?php
class Solution {

  /**
   * @param String $word1
   * @param String $word2
   * @return Integer

    输入: word1 = "horse", word2 = "ros"
    输出: 3
    解释: 
    horse -> rorse (将 'h' 替换为 'r')
    rorse -> rose (删除 'r')
    rose -> ros (删除 'e')


    1. dp[i,j] word1 前i个字符到word2前j个字符需要的最少步数
    2. if w1[i] = w2[j] dp[i,j] = dp[i-1,j-1]
      else  dp[i,j] = min(dp[i-1,j],dp[i,j-1],dp[i-1,j-1]) + 1
   */
  function minDistance($word1, $word2) {
    $m = strlen($word1);
    $n = strlen($word2);
    $dp = [];
    for ($i = 0; $i <= $m; $i++) {
      $dp[$i][0] = $i;
    }
    for ($j = 0; $j <= $n; $j++) {
      $dp[0][$j] = $j;
    }
    for ($i = 1; $i <= $m; $i++) {
      for ($j = 1; $j <= $n; $j++) {
        if ($word1[$i] == $word2[$j]) {
          $dp[$i][$j] = $dp[$i - 1][$j - 1];
        } else {
          $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1],$dp[$i - 1][$j - 1]) + 1;
        }
      }
    }
    return $dp[$m][$n];
  }
}