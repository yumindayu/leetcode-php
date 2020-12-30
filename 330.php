<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer
     */
    public function minPatches($nums, $n)
    {
        $ans   = 0;
        $i     = 1;
        $count = count($nums);
        $index = 0;
        while ($i <= $n) {
            if ($index < $count && $nums[$index] <= $i) {
                $i += $nums[$index];
                $index++;
            } else {
                $i *= 2;
                $ans++;
            }
        }
        return $ans;
    }
}
