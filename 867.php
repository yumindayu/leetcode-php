<?php
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    public function transpose($matrix)
    {
        $m   = count($matrix);
        $n   = count($matrix[0]);
        $ans = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $ans[$j][$i] = $matrix[$i][$j];
            }
        }
        return $ans;
    }
}
