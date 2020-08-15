<?php
class Solution
{
    public $count = 0;
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function reversePairs($nums)
    {
        $this->mergeSort($nums, 0, count($nums) - 1);
        return $this->count;
    }

    public function mergeSort(&$nums, $left, $right)
    {
        if ($left >= $right) {
            return;
        }

        $mid = floor(($right - $left) / 2) + $left;
        $this->mergeSort($nums, $left, $mid);
        $this->mergeSort($nums, $mid + 1, $right);
        $this->merge($nums, $left, $mid, $right);

    }
    public function merge(&$nums, $left, $mid, $right)
    {
        $i = $left;
        for ($j = $mid + 1; $j <= $right; $j++) {
            while ($i <= $mid && 2 * $nums[$j] >= $nums[$i]) {
                $i++;
            }
            $this->count += $mid - $i + 1;
        }
        $tmp = [];
        $i   = $left;
        $j   = $mid + 1;
        while ($i <= $mid && $j <= $right) {
            if ($nums[$i] <= $nums[$j]) {
                array_push($tmp, $nums[$i]);
                $i++;
            } else {
                array_push($tmp, $nums[$j]);
                $j++;
            }
        }
        while ($i <= $mid) {
            array_push($tmp, $nums[$i]);
            $i++;
        }
        while ($j <= $right) {
            array_push($tmp, $nums[$j]);
            $j++;
        }
        for ($k = 0; $k < count($tmp); $k++) {
            $nums[$left + $k] = $tmp[$k];
        }
    }
}
