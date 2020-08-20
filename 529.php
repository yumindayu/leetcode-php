<?php
class Solution
{

    public $direction = [[0, 1], [1, 0], [0, -1], [-1, 0], [1, 1], [1, -1], [-1, 1], [-1, -1]];

    /**
     * DFS
     * @param String[][] $board
     * @param Integer[] $click
     * @return String[][]
     */
    public function updateBoard($board, $click)
    {
        $row = $click[0];
        $col = $click[1];
        if ($board[$row][$col] == 'M') {
            $board[$row][$col] = "X";
            return $board;
        }
        $this->dfs($board, $row, $col);
        return $board;
    }

    public function dfs(&$board, $x, $y)
    {
        $count = 0;
        //先看周围八联通雷的数量，如果有雷 更新成雷的数量 否则递归下去
        foreach ($this->direction as $direction) {
            $row = $x + $direction[0];
            $col = $y + $direction[1];

            if ($row < 0 || $row >= count($board) || $col < 0 || $col >= count($board[0])) {
                continue;
            }
            if ($board[$row][$col] == 'M') {
                $count++;
            }
        }
        if ($count > 0) {
            $board[$x][$y] = (string) $count;
        } else {
            $board[$x][$y] = 'B';
            foreach ($this->direction as $direction) {
                $row = $x + $direction[0];
                $col = $y + $direction[1];

                if ($row < 0 || $row >= count($board) || $col < 0 || $col >= count($board[0]) || $board[$row][$col] != 'E') {
                    continue;
                }
                $this->dfs($board, $row, $col);
            }
        }
    }
}
