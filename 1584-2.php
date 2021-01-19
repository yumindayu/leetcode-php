<?php
class Solution
{
    public $root = [];
    /**
     * @param Integer[][] $points
     * @return Integer
     */
    public function minCostConnectPoints($points)
    {
        $n = count($points);
        for ($i = 0; $i < $n; $i++) {
            $this->root[$i] = $i;
        }

        $edges = [];
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                array_push($edges, new Edge($i, $j, abs($points[$i][0] - $points[$j][0]) + abs($points[$i][1] - $points[$j][1])));
            }
        }
        usort($edges, function ($a, $b) {
            return $a->val - $b->val;
        });
        // 从低到高遍历所有边
        $res = 0;
        foreach ($edges as $edge) {
            $x = $this->find($edge->a);
            $y = $this->find($edge->b);
            if ($x != $y) {
                $this->union($x, $y);
                $res += $edge->val;
            }
        }

        return $res;
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
}

// 定义边
class Edge
{
    // 分别表示一条边两个点的索引和边长
    public $a;
    public $b;
    public $val;
    public function __construct($a, $b, $val)
    {
        $this->a   = $a;
        $this->b   = $b;
        $this->val = $val;
    }
}
