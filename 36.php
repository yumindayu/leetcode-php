<?php
class Solution
{

    /**
     * @param String[][] $board
     * @return Boolean
     */
    public function isValidSudoku($board)
    {
        for ($i = 0; $i < 9; $i++) {
            $rows = [];
            $cols = [];
            $cube = [];
            for ($j = 0; $j < 9; $j++) {
                if ($board[$i][$j] != "." && isset($rows[$board[$i][$j]])) {
                    return false;
                } else {
                    $rows[$board[$i][$j]] = true;
                }

                if ($board[$j][$i] != "." && isset($cols[$board[$j][$i]])) {
                    return false;
                } else {
                    $cols[$board[$j][$i]] = true;
                }

                $x = 3 * floor($i / 3) + floor($j / 3);
                $y = 3 * floor($i % 3) + floor($j % 3);
                if ($board[$x][$y] != "." && isset($cube[$board[$x][$y]])) {
                    return false;
                } else {
                    $cube[$board[$x][$y]] = true;
                }
            }
        }
        return true;
    }
}
