<?php
class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    public function minDistance($word1, $word2)
    {
        $l1 = strlen($word1);
        $l2 = strlen($word2);
        $dp = [];
        for ($i = 0; $i <= $l1; $i++) {
            $dp[$i][0] = $i;
        }
        for ($j = 0; $j <= $l2; $j++) {
            $dp[0][$j] = $j;
        }

        for ($i = 1; $i <= $l1; $i++) {
            for ($j = 1; $j <= $l2; $j++) {
                if ($word1[$i - 1] == $word2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = 1 + min($dp[$i - 1][$j], $dp[$i][$j - 1]);
                }
            }
        }
        return $dp[$l1][$l2];
    }
}
