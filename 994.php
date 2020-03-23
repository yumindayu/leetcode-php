<?php
class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function orangesRotting($grid)
    {
        $m           = count($grid);
        $n           = count($grid[0]);
        $count       = 0;
        $fresh_count = 0;
        $queue       = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $fresh_count++;
                } elseif ($grid[$i][$j] == 2) {
                    $queue[] = [$i, $j, 0];
                }
            }
        }
        while (!empty($queue)) {
            list($row, $col, $time) = array_shift($queue);
            //上
            if ($row - 1 >= 0 && $grid[$row - 1][$col] == 1) {
                $grid[$row - 1][$col] = 2;
                $fresh_count--;
                $queue[] = [$row - 1, $col, $time + 1];
            }
            //下
            if ($row + 1 < $m && $grid[$row + 1][$col] == 1) {
                $grid[$row + 1][$col] = 2;
                $fresh_count--;
                $queue[] = [$row + 1, $col, $time + 1];
            }
            //左
            if ($col - 1 >= 0 && $grid[$row][$col - 1] == 1) {
                $grid[$row][$col - 1] = 2;
                $fresh_count--;
                $queue[] = [$row, $col - 1, $time + 1];
            }
            //右
            if ($col + 1 < $n && $grid[$row][$col + 1] == 1) {
                $grid[$row][$col + 1] = 2;
                $fresh_count--;
                $queue[] = [$row, $col + 1, $time + 1];
            }
            if ($flag) {
                $count++;
            }
        }
        if ($fresh_count > 0) {
            return -1;
        }

        return $time;
    }
}
