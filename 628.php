<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function maximumProduct($nums)
    {
        $min1 = PHP_INT_MAX;
        $min2 = PHP_INT_MAX;

        $max1 = PHP_INT_MIN;
        $max2 = PHP_INT_MIN;
        $max3 = PHP_INT_MIN;

        foreach ($nums as $num) {
            if ($num < $min1) {
                $min2 = $min1;
                $min1 = $num;
            } elseif ($num < $min2) {
                $min2 = $num;
            }
            if ($num > $max1) {
                $max3 = $max2;
                $max2 = $max1;
                $max1 = $num;
            } elseif ($num > $max2) {
                $max3 = $max2;
                $max2 = $num;
            } elseif ($num > $max3) {
                $max3 = $num;
            }

        }

        return max($min1 * $min2 * $max1, $max1 * $max2 * $max3);

    }
}
