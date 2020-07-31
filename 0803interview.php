<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function findMagicIndex($nums)
    {
        $i = 0;
        while ($i < count($nums)) {
            if ($i == $nums[$i]) {
                return $i;
            }
            $i = max($i + 1, $nums[$i]);
        }
        return -1;
    }
}
