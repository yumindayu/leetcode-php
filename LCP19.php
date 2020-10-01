<?php
class Solution
{

    /**
     * @param String $leaves
     * @return Integer
     * dp[0][i] 当前叶在最终为左边红色树叶的最小次数
     * dp[1][i] 当前树叶最终为中间黄色树叶的最小次数
     * dp[2][i] 当前树叶最终为右边红色树叶的最小次数
     *
     * 状态方程： dp[i][0] = dp[i - 1][0] + (s[i] == 'r') ? 0 : 1 当前是红叶且之前是红叶代表躺赢，否则替换1次
     * dp[i][1] = min(dp[i - 1][0], dp[i - 1][1]) + (s[i] == 'y') ? 0 : 1 取之前是红叶和黄叶的最小值，如果当前是黄叶不计算，如果当前是红叶替换1次
     * dp[i][2] = min(dp[i - 1][1], dp[i - 1][2]) + (s[i] == 'r') ? 0 : 1 取之前是dp[1][i]和dp[2][i]的最小值，
    如果当前是黄叶替换1次

    初始化 dp[0][0] = s[0] == 'r' ? 0 : 1
    dp[0][1] = max
    dp[0][2] = max
     */
    public function minimumOperations($leaves)
    {
        $n        = strlen($leaves);
        $dp       = [];
        $dp[0][0] = $leaves[0] == 'r' ? 0 : 1;
        $dp[0][1] = PHP_INT_MAX;
        $dp[0][2] = PHP_INT_MAX;

        //初始化第1种情况
        // 第一列最后一个用不到，故不计算
        for ($i = 1; $i < $n - 1; $i++) {
            $dp[$i][0] = $dp[$i - 1][0] + ($leaves[$i] == 'r' ? 0 : 1);
        }
        //初始化第2种情况
        // 第二列最后一个用不到，故不计算
        for ($i = 1; $i < $n - 1; $i++) {
            $dp[$i][1] = min($dp[$i - 1][0], $dp[$i - 1][1]) + ($leaves[$i] == 'y' ? 0 : 1);
        }

        //初始化第3种情况
        for ($i = 1; $i < $n; $i++) {
            $dp[$i][2] = min($dp[$i - 1][1], $dp[$i - 1][2]) + ($leaves[$i] == 'r' ? 0 : 1);
        }
        return $dp[$n - 1][2];

    }
}
