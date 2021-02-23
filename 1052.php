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
        //先把本来是0的加上 然后将数值变为0，之后求X长度内滑动窗口的最大值
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
