<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
                      13
                    ----|
                   8|   |
                 ----   |
               5|       |
             ----       |
           3 |          |
          ----          |
        2 |             |
       ----             |
     1 |                |
   ----                 |
 1 |                    |
---------------------------------

     */
    function climbStairs($n) {
      $dp = [];
      $dp[0] = 1;
      $dp[1] = 1;
      for ($i = 2; $i <= $n; $i++) {
        $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
      }
      return $dp[$n];
    }
}
