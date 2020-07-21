<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    public function pancakeSort($A)
    {
        //该题答案是不固定的，本解法不是翻转最少的答案
        $res = [];
        for ($i = count($A) - 1; $i >= 0; $i--) {
            //找到当前区间内的最大值的下标，并且把该值两次翻转，第一次翻到头，第二次翻到尾，此时该最大值就在该在的位置上
            $maxIndex = array_search(max(array_slice($A, 0, $i + 1)), $A);
            if ($maxIndex == $i) {
                //已经在该在的位置 无须反转
                continue;
            } elseif ($maxIndex == 0) {
                //只须翻一次
                array_push($res, $i + 1);
                $this->reverse($A, 0, $i);
            } else {
                array_push($res, $maxIndex + 1);
                array_push($res, $i + 1);
                $this->reverse($A, 0, $maxIndex);
                $this->reverse($A, 0, $i);
            }
        }
        return $res;

    }

    public function reverse(&$A, $start, $end)
    {
        while ($start < $end) {
            $temp      = $A[$start];
            $A[$start] = $A[$end];
            $A[$end]   = $temp;
            $start++;
            $end--;
        }

    }

}
