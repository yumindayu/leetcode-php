<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer

      输入: [-2,1,-3,4,-1,2,1,-5,4],
      输出: 6
      解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。

      1.dp[i] : 到i下标的时候连续的最大和
      2.dp[i] =  if 如果dp[i - 1] 是负数 dp[i] nums[i] 
          else dp[i - 1] + $num[i]
     */
    function maxSubArray($nums) {
      if (!$nums) return 0;
      $dp = [];
      $dp[0] = $nums[0];
      $max = $nums[0];
      for ($i = 1; $i < count($nums); $i++) {
        $dp[$i] = $dp[$i - 1] < 0 ? $nums[$i] : $dp[$i - 1] + $nums[$i];
        $max = max($max, $dp[$i]);
      }
      return $max;
    }
}