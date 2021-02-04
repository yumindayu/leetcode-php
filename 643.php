<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    public function findMaxAverage($nums, $k)
    {
        $n   = count($nums);
        $num = 0;
        for ($i = 0; $i < $k; $i++) {
            $num += $nums[$i];
        }
        $average = $num / $k;
        for ($i = $k; $i < $n; $i++) {
            $num     = $num - $nums[$i - $k] + $nums[$i];
            $average = max($average, $num / $k);
        }
        return $average;
    }
}
