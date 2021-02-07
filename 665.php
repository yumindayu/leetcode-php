<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public function checkPossibility($nums)
    {
        $count = 0;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            if ($nums[$i] > $nums[$i + 1]) {
                $count++;
                if ($i > 0 && $nums[$i - 1] > $nums[$i + 1]) {
                    $nums[$i + 1] = $nums[$i];
                }
            }
        }
        return $count <= 1;
    }
}
