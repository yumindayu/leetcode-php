<?php

class Solution
{
    public $count = [];
    public $sum   = [];
    public $graph = [];
    /**
     * @param Integer $N
     * @param Integer[][] $edges
     * @return Integer[]
     */
    public function sumOfDistancesInTree($N, $edges)
    {
        $this->count = array_fill(0, $N, 1);
        $this->sum   = array_fill(0, $N, 0);
        foreach ($edges as $edge) {
            if (isset($this->graph[$edge[0]])) {
                array_push($this->graph[$edge[0]], $edge[1]);
            } else {
                $this->graph[$edge[0]] = [$edge[1]];
            }

            if (isset($this->graph[$edge[1]])) {
                array_push($this->graph[$edge[1]], $edge[0]);
            } else {
                $this->graph[$edge[1]] = [$edge[0]];
            }
        }
        $this->dfs(0, -1);
        $this->dfs2(0, -1, $N);
        return $this->sum;
    }

    public function dfs($now, $root)
    {
        foreach ($this->graph[$now] as $v) {
            if ($v == $root) {
                continue;
            }
            $this->dfs($v, $now);
            $this->count[$now] += $this->count[$v];
            $this->sum[$now] += $this->sum[$v] + $this->count[$v];
        }
    }

    public function dfs2($now, $root, $N)
    {
        foreach ($this->graph[$now] as $v) {
            if ($v == $root) {
                continue;
            }
            $this->sum[$v] = $this->sum[$now] - $this->count[$v] + $N - $this->count[$v];
            $this->dfs2($v, $now, $N);
        }
    }

}
