<?php
class Solution
{
    public $root = [];
    public $areas;
    /**
     * @param String[] $grid
     * @return Integer
     */
    public function regionsBySlashes($grid)
    {
        $count       = count($grid);
        $this->areas = 4 * $count * $count;
        for ($i = 0; $i < 4 * $count * $count; $i++) {
            $this->root[$i] = $i;
        }
        $left  = 0;
        $up    = 1;
        $right = 2;
        $down  = 3;
        for ($i = 0; $i < $count; $i++) {
            for ($j = 0; $j < $count; $j++) {
                $cur = ($i * $count + $j) * 4;
                if ($i > 0) {
                    $this->union($cur + $up, (($i - 1) * $count + $j) * 4 + $down);
                }
                if ($j > 0) {
                    $this->union($cur + $left, ($i * $count + $j - 1) * 4 + $right);
                }
                if ($grid[$i][$j] == ' ') {
                    $this->union($cur + $left, $cur + $up);
                    $this->union($cur + $up, $cur + $right);
                    $this->union($cur + $right, $cur + $down);
                } elseif ($grid[$i][$j] == "/") {
                    $this->union($cur + $left, $cur + $up);
                    $this->union($cur + $right, $cur + $down);
                } elseif ($grid[$i][$j] == "\\") {
                    $this->union($cur + $left, $cur + $down);
                    $this->union($cur + $up, $cur + $right);
                }
            }
        }
        return $this->areas;
    }

    public function find($x)
    {
        if ($this->root[$x] != $x) {
            $this->root[$x] = $this->find($this->root[$this->root[$x]]);
        }
        return $this->root[$x];
    }

    public function union($x, $y)
    {
        $x = $this->find($x);
        $y = $this->find($y);
        if ($x == $y) {
            return;
        }

        $this->root[$x] = $y;
        $this->areas--;
    }
}
