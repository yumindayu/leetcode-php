<?php
class Solution
{

    /**
     * @param Integer[] $customers
     * @param Integer[] $grumpy
     * @param Integer $X
     * @return Integer
     */
    public function maxSatisfied($customers, $grumpy, $X)
    {
        //找到滑动窗口里 1最多并且数额最大的连续空间
        for ($i = 0; $i < count($customers); $i++) {
            if ($grumpy[$i] == 0) {
                $sum += $customers[$i];
                $customers[$i] = 0;
            }
        }
        $max   = 0;
        $count = 0;
        $start = 0;
        for ($i = 0; $i < count($customers); $i++) {
            $count += $customers[$i];
            if ($i - $start >= $X) {
                $count -= $customers[$start];
                $start++;
            }
            $max = max($max, $count);
        }
        return $sum + $max;
    }
}
