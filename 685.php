<?php
class Solution
{

    protected $result;
    protected $doubleRoot = 0;
    protected $hadRoot;
    protected $rootResult;
    protected $father;

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    public function findRedundantDirectedConnection($edges)
    {
        $this->result     = [0, 0];
        $this->rootResult = [[0, 0], [0, 0]];
        $this->father     = $this->hadRoot     = array_fill(0, count($edges) + 1, 0);
        for ($i = 0; $i < count($this->father); ++$i) {
            $this->father[$i] = $i;
        }

        foreach ($edges as $edge) {
            $this->hadRoot[$edge[1]]++;
            if ($this->hadRoot[$edge[1]] == 2) {
                $this->doubleRoot    = $edge[1];
                $this->rootResult[1] = $edge;
            } else {
                $this->union($edge[1], $edge[0]);
            }
        }

        if ($this->doubleRoot != 0) {
            foreach ($edges as $edge) {
                if ($edge[1] == $this->doubleRoot) {
                    $this->rootResult[0] = $edge;
                    break;
                }
            }

            $root = 0;
            for ($i = 1; $i < count($this->father); ++$i) {
                if ($root == 0) {
                    $root = $this->findXFather($i);
                }
                if ($root != $this->findXFather($i)) {
                    return $this->rootResult[0];
                }
            }
            return $this->rootResult[1];
        }

        return $this->result;
    }

    public function findXFather($x)
    {
        while ($this->father[$x] != $x) {
            $this->father[$x] = $this->father[$this->father[$x]];
            $x                = $this->father[$x];
        }
        return $x;
    }

    public function union($x, $y)
    {
        $xFather = $this->findXFather($x);
        $yFather = $this->findXFather($y);

        if ($xFather != $yFather) {
            $this->father[$xFather] = $yFather;
        } else {
            $this->result[0] = $y;
            $this->result[1] = $x;
        }
    }
}
