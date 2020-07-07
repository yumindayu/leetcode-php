<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function pivotIndex($nums)
    {
        $sum    = array_sum($nums);
        $preSum = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if (2 * $preSum + $nums[$i] == $sum) {
                return $i;
            }
            $preSum += $nums[$i];
        }
        return -1;
    }
}
