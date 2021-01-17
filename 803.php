<?php
class Solution
{

    public $root = [];

    public $size = [];

    public $direction = [[0, 1], [1, 0], [-1, 0], [0, -1]];
    /**
     * @param Integer[][] $grid
     * @param Integer[][] $hits
     * @return Integer[]
     */
    public function hitBricks($grid, $hits)
    {
        $m = count($grid);
        $n = count($grid[0]);

        $copy = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $copy[$i][$j] = $grid[$i][$j];
            }
        }

        // 把 grid 中的砖头全部击碎
        foreach ($hits as $hit) {
            $copy[$hit[0]][$hit[1]] = 0;
        }

        $size       = $m * $n;
        $this->root = [];
        $this->size = [];
        for ($i = 0; $i < $size + 1; $i++) {
            $this->root[$i] = $i;
            $this->size[$i] = 1;
        }

        // 将下标为 0 的这一行的砖块与「屋顶」相连
        for ($j = 0; $j < $n; $j++) {
            if ($copy[0][$j] == 1) {
                $this->union($j, $size);
            }
        }
        // 其余网格，如果是砖块向上、向左看一下，如果也是砖块，在并查集中进行合并
        for ($i = 1; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($copy[$i][$j] == 1) {
                    if ($copy[$i - 1][$j] == 1) {
                        $this->union(($i - 1) * $n + $j, $i * $n + $j);
                    }
                    if ($j > 0 && $copy[$i][$j - 1] == 1) {
                        $this->union($i * $n + ($j - 1), $i * $n + $j);
                    }
                }
            }
        }
        $res    = array_fill(0, count($hits), 0);
        $origin = $this->getSize($size);
        for ($i = count($hits) - 1; $i >= 0; $i--) {
            $x = $hits[$i][0];
            $y = $hits[$i][1];
            if ($grid[$x][$y] == 0) {
                continue;
            }
            // 补回之前与屋顶相连的砖块数
            if ($x == 0) {
                $this->union($y, $size);
            }
            foreach ($this->direction as $dir) {
                $newX = $x + $dir[0];
                $newY = $y + $dir[1];
                if ($newX >= 0 && $newX < $m && $newY >= 0 && $newY < $n && $copy[$newX][$newY] == 1) {
                    $this->union($x * $n + $y, $newX * $n + $newY);
                }
            }
            $current = $this->getSize($size);
            $res[$i] = max($current - $origin - 1, 0);

            // $origin = $current;
            $copy[$x][$y] = 1;
        }
        return $res;
    }

    /**
     * @param x
     * @return x
     */
    public function getSize($x)
    {
        $root = $this->find($x);
        return $this->size[$root];
    }

    public function find($x)
    {
        if ($this->root[$x] != $x) {
            $this->root[$x] = $this->find($this->root[$x]);
        }
        return $this->root[$x];
    }

    public function union($x, $y)
    {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX == $rootY) {
            return;
        }
        $this->root[$rootX] = $rootY;
        // 在合并的时候维护数组 size
        $this->size[$rootY] += $this->size[$rootX];
    }

}
