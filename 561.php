<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function arrayPairSum($nums)
    {
        sort($nums);
        $ans = 0;
        for ($i = 0; $i < count($nums); $i += 2) {
            $ans += $nums[$i];
        }
        return $ans;

    }
}
