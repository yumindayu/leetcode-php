<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Solution
{

    /**
     * @param Integer[] $days
     * @param Integer[] $costs
     * @return Integer
     */
    public function mincostTickets($days, $costs)
    {
        $dp = [];
        for ($i = 0; $i < $days[0]; $i++) {
            $dp[$i] = 0;
        }
        $expires = [1, 7, 30];
        for ($i = 1; $i <= $days[count($days) - 1]; $i++) {
            if (!in_array($i, $days)) {
                $dp[$i] = $dp[$i - 1];
            } else {
                $dp[$i] = min($dp[$i - 1] + $costs[0], $dp[max(0, $i - 7)] + $costs[1], $dp[max(0, $i - 30)] + $costs[2]);
            }
        }
        return $dp[$days[count($days) - 1]];
    }
}
$test  = new Solution;
$days  = [1, 4, 6, 7, 8, 20];
$costs = [7, 2, 15];
$ret   = $test->mincostTickets($days, $costs);
var_dump($ret);
