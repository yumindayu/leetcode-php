<?php
class Solution
{

    /**
     * 动态规划
     * @param String $s
     * @return Integer
     */
    public function countSubstrings($s)
    {
        $n   = strlen($s);
        $res = $n;
        if ($s[0] == $s[1]) {
            $res++;
        }
        $dp = [];
        for ($i = 0; $i < $n; $i++) {
            $dp[$i][$i] = true;
        }
        //以下递推方程会忽略掉 dp[0][1] 这种case 所以第14行单独判断一下
        for ($j = 2; $j < $n; $j++) {
            for ($i = 0; $i < $j; $i++) {
                if ($s[$i] == $s[$j] && ($j - $i <= 2 || $dp[$i + 1][$j - 1])) {
                    $dp[$i][$j] = true;
                    $res++;
                }
            }
        }
        return $res;
    }
}
