<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function findDuplicate($nums)
    {
        $i = 0;
        while ($i < count($nums)) {
            if ($nums[$i] != $i + 1) {
                $temp = $nums[$i];
                if ($temp == $nums[$temp - 1]) {
                    return $temp;
                }
                $nums[$i]        = $nums[$nums[$i] - 1];
                $nums[$temp - 1] = $temp;
            } else {
                $i++;
            }
        }
    }
}
