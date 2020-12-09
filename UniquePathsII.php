<?php
class Solution
{

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    public function uniquePathsWithObstacles($obstacleGrid)
    {
        $m = count($obstacleGrid);
        $n = count($obstacleGrid[0]);

        $dp = array_fill(0, $m, array_fill(0, $n, 0));
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($obstacleGrid[$i][$j] == 1) {
                    continue;
                } elseif ($i == 0 && $j == 0) {
                    //入口
                    $dp[$i][$j] = 1;
                } elseif ($i == 0) {
                    //第一行
                    $dp[$i][$j] = $dp[$i][$j - 1];
                } elseif ($j == 0) {
                    //第一列
                    $dp[$i][$j] = $dp[$i - 1][$j];
                } else {
                    $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
                }
            }
        }
        return $dp[$m - 1][$n - 1];
    }
}
