<?php
class Solution
{
    public $root;
    public $size;
    /**
     * @param Integer[] $row
     * @return Integer
     */
    public function minSwapsCouples($row)
    {
        $n = count($row);
        for ($i = 0; $i < $n / 2; $i++) {
            $this->root[$i] = $i;
        }
        $this->size = $n / 2;

        for ($i = 0; $i < $n; $i += 2) {
            $l = $row[$i] / 2;
            $r = $row[$i + 1] / 2;
            // 联通相邻的二位
            $this->union($l, $r);
        }
        // 返回需要调整的差值
        return $n / 2 - $this->size;
    }

    public function union($x, $y)
    {
        $x = $this->find($x);
        $y = $this->find($y);
        if ($x != $y) {
            $this->size--;
            $this->root[$x] = $y;
        }
    }

    public function find($x)
    {
        if ($this->root[$x] != $x) {
            $this->root[$x] = $this->find($this->root[$this->root[$x]]);
        }
        return $this->root[$x];
    }
}
