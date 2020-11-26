<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function maximumGap($nums)
    {
        if (count($nums) <= 1) {
            return 0;
        }

        $n = count($nums);

        $min = min($nums);
        $max = max($nums);
        if ($max - $min == 0) {
            return 0;
        }

        $interval  = (int) ceil(($max - $min) / ($n - 1));
        $bucketMin = $bucketMax = [];
        $bucketMin = array_fill(0, $n - 1, PHP_INT_MAX);
        $bucketMax = array_fill(0, $n - 1, -1);

        for ($i = 0; $i < count($nums); $i++) {
            $index = ($nums[$i] - $min) / $interval;
            if ($nums[$i] == $min || $nums[$i] == $max) {
                continue;
            }
            $bucketMin[$index] = min($nums[$i], $bucketMin[$index]);
            $bucketMax[$index] = max($nums[$i], $bucketMax[$index]);
        }
        $maxGap      = 0;
        $previousMax = $min;
        for ($i = 0; $i < $n - 1; $i++) {
            if ($bucketMax[$i] == -1) {
                continue;
            }
            $maxGap      = max($bucketMin[$i] - $previousMax, $maxGap);
            $previousMax = $bucketMax[$i];
        }
        $maxGap = max($max - $previousMax, $maxGap);
        return $maxGap;
    }
}
