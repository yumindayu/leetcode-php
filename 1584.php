<?php
class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    public function minCostConnectPoints($points)
    {
        $tmp = $points[0];
        unset($points[0]);
        $num  = 0;
        $list = [];
        while ($points) {
            $min = -1;
            foreach ($points as $k => $v) {
                $len      = abs($tmp[0] - $v[0]) + abs($tmp[1] - $v[1]);
                $list[$k] = isset($list[$k]) ? min($list[$k], $len) : $len;
                $min      = $min < 0 ? $list[$k] : min($min, $list[$k]);
                if ($min == $list[$k]) {
                    $key = $k;
                }

            }
            $tmp = $points[$key];
            unset($points[$key]);
            $num += $min;
        }
        return $num;
    }
}
