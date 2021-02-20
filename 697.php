<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function findShortestSubArray($nums)
    {
        $left  = [];
        $right = [];
        $count = [];
        $max   = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($left[$nums[$i]])) {
                $left[$nums[$i]] = $i;
            }
            $right[$nums[$i]] = $i;
            if (isset($count[$nums[$i]])) {
                $count[$nums[$i]]++;
            } else {
                $count[$nums[$i]] = 1;
            }
            $max = max($max, $count[$nums[$i]]);
        }
        $min = PHP_INT_MAX;
        foreach ($count as $key => $num) {
            if ($num == $max) {
                $min = min($min, $right[$key] - $left[$key] + 1);
            }
        }
        return $min;
    }
}
