<?php
class Solution
{

    /**
     * @param Integer[] $cardPoints
     * @param Integer $k
     * @return Integer
     */
    public function maxScore($cardPoints, $k)
    {
        $n      = count($cardPoints);
        $window = $n - $k;
        $sum    = 0;
        for ($i = 0; $i < $window; $i++) {
            $sum += $cardPoints[$i];
        }
        $min = $sum;
        for ($i = $window; $i < $n; $i++) {
            $sum += $cardPoints[$i] - $cardPoints[$i - $window];
            $min = min($min, $sum);
        }
        return array_sum($cardPoints) - $min;
    }
}
