<?php
class Solution
{
    public $visited = [];

    public $rows;

    public $cols;
    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    public function longestIncreasingPath($matrix)
    {
        $this->rows    = count($matrix);
        $this->cols    = count($matrix[0]);
        $this->visited = array_fill(0, $this->rows * $this->cols, 0);

        $res = 0;
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix[0]); $j++) {
                $res = max($res, $this->_dfs($matrix, $i, $j));
            }
        }
        return $res;
    }

    public function _dfs($matrix, $i, $j)
    {
        if ($this->visited[$i * $this->cols + $j] != 0) {
            return $this->visited[$i * $this->cols + $j];
        }
        $this->visited[$i * $this->cols + $j]++;
        // $this->visited[$i * count($matrix[0]) + $j]++;
        $direction = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        foreach ($direction as $d) {
            $x = $i + $d[0];
            $y = $j + $d[1];
            if ($x >= 0 && $x < count($matrix) && $y >= 0 && $y < count($matrix[0]) && $matrix[$x][$y] > $matrix[$i][$j]) {
                $this->visited[$i * $this->cols + $j] = max($this->visited[$i * $this->cols + $j], $this->_dfs($matrix, $x, $y) + 1);
            }
        }
        return $this->visited[$i * $this->cols + $j];
    }

}
