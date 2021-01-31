<?php
class Solution
{

    public $root;
    /**
     * @param String[] $strs
     * @return Integer
     */
    public function numSimilarGroups($strs)
    {
        $count  = count($strs);
        $length = strlen($strs[0]);
        for ($i = 0; $i < $count; $i++) {
            $this->root[$i] = $i;
        }
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                $x = $this->find($i);
                $y = $this->find($j);
                if ($x == $y) {
                    continue;
                }
                if ($this->check($strs[$i], $strs[$j], $length)) {
                    $this->union($x, $y);
                }
            }
        }
        $ret = 0;
        for ($i = 0; $i < $count; $i++) {
            if ($this->root[$i] == $i) {
                $ret++;
            }
        }
        return $ret;
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
        $x              = $this->find($x);
        $y              = $this->find($y);
        $this->root[$x] = $y;
    }

    public function check($a, $b, $length)
    {
        $num = 0;
        for ($i = 0; $i < $length; $i++) {
            if ($a[$i] != $b[$i]) {
                $num++;
                if ($num > 2) {
                    return false;
                }
            }
        }
        return true;
    }
}
