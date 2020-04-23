<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    public function waysToChange($n)
    {
        if ($n <= 1) {
            return $n;
        }

        $dp    = [];
        $coins = [1, 5, 10, 25];
        for ($i = 0; $i <= $n; $i++) {
            $dp[$i] = 0;
        }
        for ($i = 0; $i < count($coins); $i++) {
            $dp[$coins[$i]] += 1;
            for ($j = $coins[$i]; $j <= $n; $j++) {
                $dp[$j] += $dp[$j - $coins[$i]];
            }
        }
        return $dp[$n] % 1000000007;
    }
}
