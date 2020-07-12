<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function countSmaller($nums)
    {
        //二分
        $sort_list = [];
        $ans       = [];
        for ($i = count($nums) - 1; $i >= 0; $i--) {
            $position = $this->binarySearch($sort_list, $nums[$i]);
            array_unshift($ans, $position);
            array_splice($sort_list, $position, 0, $nums[$i]);
        }
        return $ans;
    }

    public function binarySearch($list, $num)
    {
        $l = 0;
        $r = count($list);
        while ($l < $r) {
            $mid = floor(($r - $l) / 2) + $l;
            if ($list[$mid] >= $num) {
                $r = $mid;
            } else {
                $l = $mid + 1;
            }
        }
        return $l;
    }
}
