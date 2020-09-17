<?php
class Solution
{

    public $root;
    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    public function findRedundantConnection($edges)
    {
        $count = count($edges);
        for ($i = 0; $i < $count; $i++) {
            $this->root[$i] = $i;
        }

        foreach ($edges as $edge) {
            if ($this->find($edge[0]) == $this->find($edge[1])) {
                return $edge;
            }
            $this->union($edge[0], $edge[1]);
        }
        return [];
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
