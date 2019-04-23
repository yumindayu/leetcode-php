<?php
class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean

      s = "adceb"
      p = "*a*b"

      a  d  c  e  b
      *  a  *  b
      
      star = 0 i_index = 0 j++
      star = 2 i_index = 1 j++
      j:b 

     */
    function isMatch($s, $p) {
      $i = 0;
      $j = 0;
      $star = -1;
      $i_index = 0;

      while ($i < strlen($s)) {
        if ($j < strlen($p) && ($s[$i] == $p[$j] || $p[$j] == "?")) {
          $i++;
          $j++;
        } else if ($j < strlen($p) && $p[$j] == "*") {
          $star = $j;
          $i_index = $i;
          $j++;
        } else if ($star != -1) {
          $j = $star + 1;
          $i_index++;
          $i = $i_index;
        } else {
          return false;
        }
      }
      while ($j < strlen($p) && $p[$j] == "*") {
        $j++;
      } 
      return $j == strlen($p);
    }

    /**
     * 定义状态：dp[i][j]  //s 前i个字符 和 p 前j个字符匹配关系
     转移方程 (s[i - 1] == p[j - 1] || p[j] == ?) dp[i][j] = dp[i - 1][j - 1]
     p[j - 1] == * dp[i][j] = dp[i - 1][j] || dp[i][j - 1] || dp[i - 1][j - 1]

     */
    function isMatch2($s, $p) {
      $dp = [];
      $dp[0][0] = true;
      for ($j = 1; $j <= strlen($p); $j++) {
        if ($p[$j - 1] == "*") {
          $dp[0][$j] = $dp[0][$j - 1];
        }
      }

      for ($i = 1; $i <= strlen($s); $i++) {
        for ($j = 1; $j <= strlen($p); $j++) {
          if ($s[$i - 1] == $p[$j - 1] || $p[$j - 1] == "?") {
            $dp[$i][$j] = $dp[$i - 1][$j - 1];
          } else if ($p[$j - 1] == "*") {
            $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i][$j - 1] || $dp[$i - 1][$j - 1];
          }
        }
      }
      return $dp[strlen($s)][strlen($p)];
    }
}
























