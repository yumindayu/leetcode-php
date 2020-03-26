<?php
class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function surfaceArea($grid)
    {
        $result = 0;
        $m      = count($grid);
        $n      = count($grid[0]);
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] != 0) {
                    $result += $grid[$i][$j] * 4 + 2;
                }
                if ($i > 0) {
                    $result -= min($grid[$i - 1][$j], $grid[$i][$j]) * 2;
                }
                if ($j > 0) {
                    $result -= min($grid[$i][$j - 1], $grid[$i][$j]) * 2;
                }
            }
        }
        return $result;
    }
}
