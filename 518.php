<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Solution
{

    /**
     * @param Integer $amount
     * @param Integer[] $coins
     * @return Integer
     */
    public function change($amount, $coins)
    {
        if (!$amount) {
            return 1;
        }

        $dp = [];
        for ($i = 0; $i <= $amount; $i++) {
            $dp[$i] = 0;
        }
        for ($i = 0; $i < count($coins); $i++) {
            $dp[$coins[$i]] += 1;
            for ($j = $coins[$i]; $j <= $amount; $j++) {
                $dp[$j] += $dp[$j - $coins[$i]];
            }
        }
        return $dp[$amount] ?? 0;
    }
}
$test   = new Solution;
$amount = 5;
$coins  = [1, 2, 5];
$ret    = $test->change($amount, $coins);
var_dump($ret);exit;
