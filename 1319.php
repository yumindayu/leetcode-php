<?php
class Solution
{

    public $root = [];
    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    public function makeConnected($n, $connections)
    {
        if (count($connections) < $n - 1) {
            return -1;
        }

        for ($i = 0; $i < $n; $i++) {
            $this->root[$i] = $i;
        }
        foreach ($connections as $connection) {
            $this->union($connection[0], $connection[1]);
        }
        $count = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($this->root[$i] == $i) {
                $count++;
            }
        }
        return $count - 1;
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
        if ($x != $y) {
            $this->root[$x] = $y;
        }
    }
}
