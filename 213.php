<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function rob($nums)
    {
        if (!$nums) {
            return 0;
        }

        if (count($nums) == 1) {
            return $nums[0];
        }

        $max1 = $this->myRob(array_slice($nums, 0, count($nums) - 1));
        $max2 = $this->myRob(array_slice($nums, 1));
        return max($max1, $max2);
    }

    public function myRob($nums)
    {
        if (!$nums) {
            return 0;
        }

        $pre     = 0;
        $current = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $temp    = $pre;
            $pre     = $current;
            $current = max($temp + $nums[$i], $current);
        }
        return $current;
    }
}
