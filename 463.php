<?php
class Solution
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function islandPerimeter($grid)
    {
        $m   = count($grid);
        $n   = count($grid[0]);
        $ans = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $ans += 4;
                    if ($i > 0 && $grid[$i - 1][$j] == 1) {
                        //看左边有没有相邻
                        $ans -= 2;
                    }
                    if ($j > 0 && $grid[$i][$j - 1] == 1) {
                        //看下面有没有相邻
                        $ans -= 2;
                    }
                }
            }
        }
        return $ans;
    }

}
