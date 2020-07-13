<?php
class Solution
{
    public function openLock($deadends, $target)
    {
        $p          = $q          = $visited          = [];
        $p['0000']  = true;
        $q[$target] = true;
        $step       = 0;
        $deadends   = array_flip($deadends); //避免用坑爹的in_array判断
        while (!empty($p)) {
            if (count($p) > count($q)) {
                $a = $p;
                $p = $q;
                $q = $a;
            }
            $temp = [];
            foreach ($p as $cur => $v) {
                $visited[$cur] = true;
                if (isset($deadends[$cur])) {
                    continue;
                }

                if (isset($q[$cur])) {
                    return $step;
                }

                $cur = $cur . ''; //默认target是整型，这里需要转字符串
                for ($i = 0; $i < 4; $i++) {
                    $up     = $cur;
                    $up[$i] = $cur[$i] == "9" ? "0" : (int) $cur[$i] + 1;
                    //往上拔 9再往上是0
                    if (!isset($visited[$up])) {
                        $temp[$up] = true;
                    }
                    //往下调 0再往下是9
                    $down     = $cur;
                    $down[$i] = $cur[$i] == "0" ? "9" : (int) $cur[$i] - 1;
                    if (!isset($visited[$down])) {
                        $temp[$down] = true;
                    }
                }
            }

            $p = $temp;
            $step++;
        }

        return -1;
    }
}
