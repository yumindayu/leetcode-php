<?php
class Solution
{

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    public function generate($numRows)
    {
        $res = [];
        for ($i = 0; $i < $numRows; $i++) {
            if ($i == 0) {
                $res[$i] = [1];
            } elseif ($i == 1) {
                $res[$i] = [1, 1];
            } else {
                $res[$i][0] = 1;
                for ($j = 1; $j < $i; $j++) {
                    $res[$i][$j] = $res[$i - 1][$j - 1] + $res[$i - 1][$j];
                }
                $res[$i][$i] = 1;
            }
        }
        return $res;
    }
}
