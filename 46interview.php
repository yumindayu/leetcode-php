<?php
class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    public function translateNum($num)
    {
        $dp    = [];
        $dp[0] = 1;
        $dp[1] = 1;
        for ($i = 2; $i <= strlen($num); $i++) {
            $str = substr($num, $i - 2, 2);
            if ($str >= 0 && $str <= 25 && $str[0] != 0) {
                $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
            } else {
                $dp[$i] = $dp[$i - 1];
            }
        }
        return $dp[strlen($num)];
    }

}
