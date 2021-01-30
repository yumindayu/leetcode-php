<?php
class Solution
{
    public $root = [];

    public $direction = [[0, 1], [0, -1], [1, 0], [-1, 0]];
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function swimInWater($grid)
    {
        $count = count($grid);
        $len   = $count * $count;
        //坐标压缩
        $index = array_fill(0, $len, 0);
        for ($i = 0; $i < $count; $i++) {
            for ($j = 0; $j < $count; $j++) {
                $index[$grid[$i][$j]] = $i * $count + $j;
            }
        }
        for ($i = 0; $i < $len; $i++) {
            $this->root[$i] = $i;
        }
        for ($i = 0; $i < $len; $i++) {
            $x = floor($index[$i] / $count);
            $y = $index[$i] % $count;
            foreach ($this->direction as $direction) {
                $newX = $x + $direction[0];
                $newY = $y + $direction[1];
                if ($newX >= 0 && $newX < $count && $newY >= 0 && $newY < $count && $grid[$newX][$newY] <= $i) {
                    $this->union($index[$i], $newX * $count + $newY);
                }
                if ($this->find(0) == $this->find($len - 1)) {
                    return $i;
                }
            }
        }
        return -1;
    }

    public function union($x, $y)
    {
        $x              = $this->find($x);
        $y              = $this->find($y);
        $this->root[$x] = $y;
    }

    public function find($x)
    {
        if ($this->root[$x] != $x) {
            $this->root[$x] = $this->find($this->root[$this->root[$x]]);
        }
        return $this->root[$x];
    }
}
