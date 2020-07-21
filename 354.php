<?php
class Solution
{

    /**
     * @param Integer[][] $envelopes
     * @return Integer
     */
    public function maxEnvelopes($envelopes)
    {
        if (!$envelopes) {
            return 0;
        }

        //宽度自增排序，如果宽度相等则长度降序
        usort($envelopes, function ($a, $b) {
            if ($a[0] == $b[0]) {
                return $b[1] - $a[1];
            }
            return $a[0] - $b[0];
        });
        $array = array_map(function ($a) {return $a[1];}, $envelopes); //获取长度的数组，答案就是长度组成的数组的最长上升子序列
        $dp  = array_fill(0, count($array), 1);
        $max = 1;
        for ($i = 1; $i < count($array); $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($array[$i] > $array[$j]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                    $max    = max($max, $dp[$i]);
                }
            }
        }
        return $max;
    }

}
