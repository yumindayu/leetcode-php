<?php
class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     * @github https://github.com/yumindayu/leetcode-php


    arr = [1,5,6,2,7,10] k = 3

    6
    1   5

     */
    public function getLeastNumbers($arr, $k)
    {
        if ($k == 0) {
            return [];
        }

        $heap = new \SplMaxHeap;
        for ($i = 0; $i < $k; $i++) {
            $heap->insert($arr[$i]);
        }
        for ($i = $k; $i < count($arr); $i++) {
            $top = $heap->top();
            if ($arr[$i] < $top) {
                $heap->extract();
                $heap->insert($arr[$i]);
            }
        }
        $ret = [];
        foreach ($heap as $num) {
            $ret[] = $num;
        }
        return $ret;
    }
}
