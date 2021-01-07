<?php
class Solution
{
    public $root = [];
    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    public function findCircleNum($isConnected)
    {
        $m = count($isConnected);
        $n = count($isConnected[0]);
        for ($i = 0; $i < $m; $i++) {
            $this->root[$i] = $i;
        }
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($isConnected[$i][$j] == 1) {
                    $this->union($i, $j);
                }
            }
        }
        $ans = 0;
        for ($i = 0; $i < $m; $i++) {
            if ($this->root[$i] == $i) {
                $ans++;
            }
        }
        return $ans;
    }

    public function union($x, $y)
    {
        $x = $this->find($x);
        $y = $this->find($y);

        $this->root[$x] = $y;
    }

    public function find($x)
    {
        while ($this->root[$x] != $x) {
            $this->root[$x] = $this->root[$this->root[$x]];
            $x              = $this->root[$x];
        }
        return $x;
    }
}
