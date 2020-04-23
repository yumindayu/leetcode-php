<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public function numberOfSubarrays($nums, $k)
    {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] % 2 != 0) {
                array_push($map, $i);
            }
        }
        array_unshift($map, -1);
        array_push($map, count($nums));
        $res = 0;
        for ($i = 1; $i + $k < count($map); $i++) {
            $res += ($map[$i] - $map[$i - 1]) * ($map[$i + $k] - $map[$i + $k - 1]);
        }
        return $res;

    }
}
$test = new Solution;
$nums = [1, 1, 2, 1, 1];
$k    = 3;
$test->numberOfSubarrays($nums, $k);
