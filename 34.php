<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function searchRange($nums, $target)
    {
        return [$this->search($nums, $target, "first"), $this->search($nums, $target, "last")];
    }

    public function search($nums, $target, $search)
    {
        $left  = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $mid = floor(($right - $left) / 2) + $left;
            if ($nums[$mid] == $target) {
                if ($search == "first") {
                    if ($mid == 0 || $nums[$mid - 1] != $target) {
                        return $mid;
                    }
                    $right = $mid - 1;
                } else {
                    if ($mid == count($nums) - 1 || $nums[$mid + 1] != $target) {
                        return $mid;
                    }
                    $left = $mid + 1;
                }
            } elseif ($nums[$mid] > $target) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return -1;
    }

}
