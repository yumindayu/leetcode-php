<?php
class Solution
{

    /**
     * @param Integer[][] $board
     * @return NULL
     * @github https://github.com/yumindayu/leetcode-php
     */
    public function gameOfLife(&$board)
    {
        $m = count($board);
        $n = count($board[0]);
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                //0 变活 改成2
                //1 变色 改成3
                if ($board[$i][$j] == 0) {
                    $count = $this->checkLive($board, $i, $j, $m, $n);
                    if ($count == 3) {
                        $board[$i][$j] = 2;
                    }
                } else {
                    $count = $this->checkLive($board, $i, $j, $m, $n);
                    if ($count < 2 || $count > 3) {
                        $board[$i][$j] = 3;
                    }
                }
            }
        }
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($board[$i][$j] == 2) {
                    $board[$i][$j] = 1;
                }
                if ($board[$i][$j] == 3) {
                    $board[$i][$j] = 0;
                }
            }
        }
    }

    public function checkLive($board, $row, $col, $m, $n)
    {
        $live_count = 0;
        $live_count += $this->count($board, $row - 1, $col, $m, $n);
        $live_count += $this->count($board, $row + 1, $col, $m, $n);
        $live_count += $this->count($board, $row, $col - 1, $m, $n);
        $live_count += $this->count($board, $row, $col + 1, $m, $n);
        $live_count += $this->count($board, $row - 1, $col - 1, $m, $n);
        $live_count += $this->count($board, $row + 1, $col - 1, $m, $n);
        $live_count += $this->count($board, $row - 1, $col + 1, $m, $n);
        $live_count += $this->count($board, $row + 1, $col + 1, $m, $n);
        return $live_count;
    }

    public function count($board, $row, $col, $m, $n)
    {
        if ($row < 0 || $row >= $m || $col < 0 || $col >= $n) {
            return 0;
        }

        if ($board[$row][$col] == 0 || $board[$row][$col] == 2) {
            return 0;
        }

        return 1;
    }

}
