<?php
class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function maxDistance($grid)
    {
        $m     = count($grid);
        $n     = count($grid[0]);
        $queue = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $queue[] = [$i, $j, 0];
                }
            }
        }
        if (empty($queue) || count($queue) == $m * $n) {
            return -1;
        }

        while (!empty($queue)) {
            list($row, $col, $time) = array_shift($queue);
            //上
            if ($row - 1 >= 0 && $grid[$row - 1][$col] == 0) {
                $grid[$row - 1][$col] = 2;
                $queue[]              = [$row - 1, $col, $time + 1];
            }
            //下
            if ($row + 1 < $m && $grid[$row + 1][$col] == 0) {
                $grid[$row + 1][$col] = 2;
                $queue[]              = [$row + 1, $col, $time + 1];
            }
            //左
            if ($col - 1 >= 0 && $grid[$row][$col - 1] == 0) {
                $grid[$row][$col - 1] = 2;
                $queue[]              = [$row, $col - 1, $time + 1];
            }
            //右
            if ($col + 1 < $n && $grid[$row][$col + 1] == 0) {
                $grid[$row][$col + 1] = 2;
                $queue[]              = [$row, $col + 1, $time + 1];
            }

        }
        return $time;
    }

    public function maxDistance2($grid)
    {
        $n  = count($grid);
        $dp = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $dp[$i][$j] = $grid[$i][$j] ? 0 : INF;
            }
        }

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j]) {
                    continue;
                }

                if ($i - 1 >= 0) {
                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i - 1][$j] + 1);
                }
                if ($j - 1 >= 0) {
                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i][$j - 1] + 1);
                }
            }
        }
        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $n - 1; $j >= 0; $j--) {
                if ($grid[$i][$j] == 1) {
                    continue;
                }

                if ($i + 1 < $n) {
                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i + 1][$j] + 1);
                }
                if ($j + 1 < $n) {
                    $dp[$i][$j] = min($dp[$i][$j], $dp[$i][$j + 1] + 1);
                }
            }
        }
        $count = -1;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if (!$grid[$i][$j]) {
                    $count = max($count, $dp[$i][$j]);
                }
            }
        }
        if ($count == INF) {
            return -1;
        }

        return $count;

    }
}
