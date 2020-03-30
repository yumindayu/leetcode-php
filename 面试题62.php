<?php
class Solution
{

    /**
     * @param Integer $n
     * @param Integer $m
     * @return Integer
     */
    public function lastRemaining($n, $m)
    {
        $ret = 0;
        for ($i = 2; $i <= $n; $i++) {
            $ret = ($ret + $m) % $i;
        }
        return $ret;
    }

    /**
     * 模拟 某些case超时
     */
    public function lastRemaining2($n, $m)
    {
        $circle = range(0, $n - 1);
        $index  = 0;
        while ($n > 1) {
            $index = ($index + $m - 1) % $n;
            unset($circle[$index]); //php里unset掉数组元素后依然保持原来的索引，所以要重新array_values一下
            array_values($circle);
            $n--;
        }
        return $circle[0];
    }
}
