<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function findDisappearedNumbers($nums)
    {
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[abs($nums[$i]) - 1] > 0) {
                $nums[abs($nums[$i]) - 1] *= -1;
            }
        }
        $res = [];
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] > 0) {
                array_push($res, $i + 1);
            }
        }
        return $res;

    }
}
