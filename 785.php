<?php
class Solution
{

    /**
     * @param Integer[][] $graph
     * @return Boolean
     */
    public function isBipartite($graph)
    {
        $n     = count($graph);
        $color = array_fill(0, $n, 0); // 初始化0为染色 1红色 2绿色
        for ($i = 0; $i < $n; $i++) {
            if ($color[$i] == 0) {
                $queue = [];
                array_push($queue, $i);
                $color[$i] = 1; //顶点是红色
                while (!empty($queue)) {
                    $node = array_shift($queue);
                    $sign = $color[$node] == 1 ? 2 : 1;
                    foreach ($graph[$node] as $neighbor) {
                        if ($color[$neighbor] == 0) {
                            array_push($queue, $neighbor);
                            $color[$neighbor] = $sign;
                        } elseif ($color[$neighbor] != $sign) {
                            return false;
                        }
                    }
                }
            }
        }
        return true;
    }
}
