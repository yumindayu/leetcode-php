<?php
class Solution
{
    public $root = [];
    /**
     * @param String $s
     * @param Integer[][] $pairs
     * @return String
     */
    public function smallestStringWithSwaps($s, $pairs)
    {
        // 索引可以多次任意交换，具有传递性，使用并查集，每个元素表示字符索引。使用优先队列排序。
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            $this->root[$i] = $i;
        }
        foreach ($pairs as $pair) {
            $this->union($pair[0], $pair[1]);
        }
        $map = [];
        for ($i = 0; $i < $n; $i++) {
            $parent = $this->find($i);
            if (isset($map[$parent])) {
                $pq = $map[$parent];
            } else {
                $pq = new SplMinHeap;
            }
            $pq->insert($s[$i]);
            $map[$parent] = $pq;
        }
        $str = "";
        for ($i = 0; $i < $n; $i++) {
            $parent = $this->root[$i];
            $pq     = $map[$parent];
            $str .= $pq ? $pq->extract() : '';
        }
        return $str;
    }

    public function union($x, $y)
    {
        $x = $this->find($x);
        $y = $this->find($y);

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
