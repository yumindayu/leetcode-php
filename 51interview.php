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
        // var_dump($nums);
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
        $tmp = [];
        $i   = $left;
        $j   = $mid + 1;
        while ($i <= $mid && $j <= $right) {
            if ($nums[$i] <= $nums[$j]) {
                array_push($tmp, $nums[$i]);
                $i++;
            } else {
                array_push($tmp, $nums[$j]);
                $this->count += $mid - $i + 1;
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
$test = new Solution;
$nums = [7, 5, 6, 4];
$ret  = $test->reversePairs($nums);
var_dump($ret);
