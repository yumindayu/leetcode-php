<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function sortColors(&$nums)
    {
        $left  = 0; //第一个0出现的位置
        $i     = 0;
        $right = count($nums) - 1; //最后一个2出现的位置
        while ($i <= $right) {
            if ($nums[$i] == 0) {
                [$nums[$i], $nums[$left]] = [$nums[$left], $nums[$i]];
                $left++;
                $i++;
            } elseif ($nums[$i] == 2) {
                [$nums[$i], $nums[$right]] = [$nums[$right], $nums[$i]];
                $right--;
            } else {
                $i++;
            }
        }
    }
}
