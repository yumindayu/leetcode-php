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
        $color = array_fill(0, $n, 0); // 初始化0 未染色 1红色 2绿色
        for ($i = 0; $i < $n; $i++) {
            //不一定是连通图，所以不能从任意一个节点开始bfs，以免漏掉顶点，所以必须是循环bfs
            if ($color[$i] == 0) {
                $queue = [];
                array_push($queue, $i);
                $color[$i] = 1; //顶点是红色
                while (!empty($queue)) {
                    $node = array_shift($queue);
                    $sign = $color[$node] == 1 ? 2 : 1; //相邻节点一定要跟顶点颜色不一样，所以取反
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
