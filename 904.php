<?php
class Solution
{

    /**
     * @param Integer[] $tree
     * @return Integer
     */
    public function totalFruit($tree)
    {
        $max = 0;
        $i   = 0;
        $j   = 0;
        $map = [];
        while ($i <= count($tree) - 1) {
            if (count($map) == 2 && !isset($map[$tree[$i]])) {
                while (count($map) >= 2) {
                    $map[$tree[$j]] -= 1;
                    if ($map[$tree[$j]] == 0) {
                        unset($map[$tree[$j]]);
                    }
                    $j++;
                }
                $max            = max($max, ($i - $j) + 1);
                $map[$tree[$i]] = $map[$tree[$i]] ? $map[$tree[$i]] + 1 : 1;
                $i++;
            } else {
                $max            = max($max, ($i - $j) + 1);
                $map[$tree[$i]] = $map[$tree[$i]] ? $map[$tree[$i]] + 1 : 1;
                $i++;
            }
        }
        return $max;
    }
}
