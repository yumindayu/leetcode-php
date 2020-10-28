<?php
class Solution
{

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    public function longestCommonSubsequence($text1, $text2)
    {
        $m  = strlen($text1);
        $n  = strlen($text2);
        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($text1[$i - 1] == $text2[$j - 1]) {
                    $dp[$i][$j] = 1 + $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = max($dp[$i][$j - 1], $dp[$i - 1][$j]);
                }
            }
        }
        return $dp[$m][$n];
    }
}
