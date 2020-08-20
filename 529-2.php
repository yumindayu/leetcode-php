<?php
class Solution
{

    public $direction = [[0, 1], [1, 0], [0, -1], [-1, 0], [1, 1], [1, -1], [-1, 1], [-1, -1]];

    /**
     * BFS
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
        $this->bfs($board, $row, $col);
        return $board;
    }

    public function bfs(&$board, $x, $y)
    {
        $queue   = [];
        $visited = [];
        array_push($queue, [$x, $y]);
        $visited[$x][$y] = true;

        while (!empty($queue)) {
            $position = array_pop($queue);
            $count    = 0;
            $row      = $position[0];
            $col      = $position[1];
            foreach ($this->direction as $direction) {
                $newrow = $row + $direction[0];
                $newcol = $col + $direction[1];

                if ($newrow < 0 || $newrow >= count($board) || $newcol < 0 || $newcol >= count($board[0])) {
                    continue;
                }
                if ($board[$newrow][$newcol] == 'M') {
                    $count++;
                }
            }
            if ($count > 0) {
                $board[$row][$col] = (string) $count;
            } else {
                $board[$row][$col] = 'B';
                foreach ($this->direction as $direction) {
                    $newrow = $row + $direction[0];
                    $newcol = $col + $direction[1];

                    if ($newrow < 0 || $newrow >= count($board) || $newcol < 0 || $newcol >= count($board[0]) || $board[$newrow][$newcol] != 'E' || isset($visited[$newrow][$newcol])) {
                        continue;
                    }
                    array_push($queue, [$newrow, $newcol]);
                    $visited[$newrow][$newcol] = true;
                }
            }
        }

    }
}
