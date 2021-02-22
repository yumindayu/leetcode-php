<?php
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Boolean
     */
    public function isToeplitzMatrix($matrix)
    {
        $m = count($matrix);
        $n = count($matrix[0]);
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                if ($matrix[$i][$j] != $matrix[$i - 1][$j - 1]) {
                    return false;
                }
            }
        }
        return true;
    }
}
