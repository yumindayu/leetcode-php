<?php
class Solution
{

    /**
     * @param String $ring
     * @param String $key
     * @return Integer
     */
    public function findRotateSteps($ring, $key)
    {
        $n   = strlen($ring);
        $m   = strlen($key);
        $pos = [];
        for ($i = 0; $i < 26; $i++) {
            $pos[$i] = [];
        }
        for ($i = 0; $i < $n; $i++) {
            array_push($pos[ord($ring[$i]) - ord('a')], $i);
        }
        $dp = array_fill(0, $m, array_fill(0, $n, 0));
        for ($i = 0; $i < $m; $i++) {
            $dp[$i] = array_fill(0, count($dp[$i]), PHP_INT_MAX);
        }
        foreach ($pos[ord($key[0]) - ord('a')] as $i) {
            $dp[0][$i] = min($i, $n - $i) + 1;
        }
        for ($i = 1; $i < $m; $i++) {
            foreach ($pos[ord($key[$i]) - ord('a')] as $j) {
                foreach ($pos[ord($key[$i - 1]) - ord('a')] as $k) {
                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i - 1][$k] + min(abs($j - $k), $n - abs($j - $k)) + 1);
                }
            }
        }
        return min($dp[$m - 1]);

    }
}
