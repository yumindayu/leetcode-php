<?php
class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    public function maxNumEdgesToRemove($n, $edges)
    {
        $uf1 = new UnionFind($n + 1);
        $uf2 = new UnionFind($n + 1);
        $r1  = 0;
        $r2  = 0;
        foreach ($edges as $edge) {
            $type = $edge[0];
            $x    = $edge[1];
            $y    = $edge[2];
            //公共边
            if ($type == 3) {
                if (!$uf1->union($x, $y)) {
                    $r1++;
                } else {
                    $uf2->union($x, $y);
                }
            }
        }
        foreach ($edges as $edge) {
            $type = $edge[0];
            $x    = $edge[1];
            $y    = $edge[2];
            //公共边
            if ($type == 1) {
                if (!$uf1->union($x, $y)) {
                    $r1++;
                }
            } elseif ($type == 2) {
                if (!$uf2->union($x, $y)) {
                    $r2++;
                }
            }
        }
        $set_num1 = 0;
        $set_num2 = 0;
        for ($i = 1; $i <= $n; $i++) {
            if ($uf1->parent[$i] == $i) {
                $set_num1++;
            }
            if ($uf2->parent[$i] == $i) {
                $set_num2++;
            }
            if ($set_num1 > 1 || $set_num2 > 1) {
                return -1;
            }

        }

        return $r1 + $r2;
    }
}
class UnionFind
{
    public $parent = [];

    public function __construct($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
        }
    }

    public function find($x)
    {
        if ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->find($this->parent[$this->parent[$x]]);
        }
        return $this->parent[$x];
    }

    public function union($x, $y)
    {
        $x = $this->find($x);
        $y = $this->find($y);
        if ($x == $y) {
            return false;
        }

        $this->parent[$x] = $y;
        return true;
    }
}
