<?php
class Solution
{
    public $root = [];
    /**
     * @param Integer[][] $stones
     * @return Integer
     */
    public function removeStones($stones)
    {
        for ($i = 0; $i < 200001; $i++) {
            $this->root[$i] = $i;
        }
        $stoneCount = count($stones);
        for ($i = 0; $i < $stoneCount; $i++) {
            $this->union($stones[$i][0], $stones[$i][1] + 10000);
        }

        $hash = [];
        for ($i = 0; $i < count($stones); $i++) {
            $hash[$this->find($stones[$i][0])] = true;
        }
        return $stoneCount - count($hash);

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
            $this->root[$x] = $this->find($this->root[$x]);
        }
        return $this->root[$x];
    }
}
