<?php
class Solution
{

    /**
     * @param Integer $n
     * @param Integer $m
     * @param Integer[] $group
     * @param Integer[][] $beforeItems
     * @return Integer[]
     */
    public function sortItems($n, $m, $group, $beforeItems)
    {
        //处理无组元素
        for ($i = 0; $i < $n; $i++) {
            if ($group[$i] < 0) {
                $group[$i] = $m++;
            }
        }
        $group2Item = [];
        for ($i = 0; $i < $m; $i++) {
            $group2Item[$i] = [];
        }
        for ($i = 0; $i < $n; $i++) {
            array_push($group2Item[$group[$i]], $i);
        }
        //得到组内和组间的依赖关系
        $inner_adj = [];
        $outer_adj = [];
        for ($i = 0; $i < $n; $i++) {
            array_push($inner_adj, []);
        }
        for ($i = 0; $i < $m; $i++) {
            array_push($outer_adj, []);
        }
        for ($i = 0; $i < count($beforeItems); $i++) {
            foreach ($beforeItems[$i] as $j) {
                if ($group[$j] == $group[$i]) {
                    array_push($inner_adj[$j], $i);
                } else {
                    array_push($outer_adj[$group[$j]], $group[$i]);
                }
            }
        }
        //对组内进行拓扑排序
        $inner_sort = [];
        for ($i = 0; $i < $m; $i++) {
            $inner_res = $this->topSort($group2Item[$i], $inner_adj);
            if ($inner_res === null) {
                return [];
            } else {
                $inner_sort[$i] = $inner_res;
            }

        }

        $groups = [];
        for ($i = 0; $i < $m; $i++) {
            array_push($groups, $i);
        }
        $out_sort = $this->topSort($groups, $outer_adj);

        if ($out_sort === null) {
            return [];
        }

        $res   = [];
        $count = 0;
        foreach ($out_sort as $i) {
            foreach ($inner_sort[$i] as $j) {
                $res[$count++] = $j;
            }
        }
        return $res;

    }

    public function topSort($items, $adj)
    {
        $res = [];
        if (count($items) == 0) {
            return $res;
        }

        $ind = [];
        foreach ($items as $item) {
            foreach ($adj[$item] as $j) {
                if (isset($ind[$j])) {
                    $ind[$j] += 1;
                } else {
                    $ind[$j] = 1;
                }

            }
        }
        $queue = [];
        foreach ($items as $item) {
            if (!isset($ind[$item]) || (isset($ind[$item]) && $ind[$item] == 0)) {
                array_push($queue, $item);
                array_push($res, $item);
            }
        }
        while (!empty($queue)) {
            $cur = array_shift($queue);
            foreach ($adj[$cur] as $i) {
                $ind[$i] -= 1;
                if ($ind[$i] == 0) {
                    array_push($queue, $i);
                    array_push($res, $i);
                }
            }
        }
        return count($res) < count($items) ? null : $res;
    }
}
