<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    public function subarraysWithKDistinct($A, $K)
    {
        return $this->helper($A, $K) - $this->helper($A, $K - 1);
    }

    /**
     * @param A
     * @param K
     * @return 最多包含 K 个不同整数的子区间的个数
     */
    public function helper($A, $K)
    {
        $len   = count($A);
        $freq  = array_fill(0, $len + 1, 0);
        $left  = 0;
        $right = 0;
        $count = 0; //[left, right) 里不同整数的个数
        $res   = 0;
        while ($right < $len) {
            if ($freq[$A[$right]] == 0) {
                $count++;
            }
            $freq[$A[$right]]++;
            $right++;
            while ($count > $K) {
                $freq[$A[$left]]--;
                if ($freq[$A[$left]] == 0) {
                    $count--;
                }
                $left++;
            }
            $res += $right - $left;
        }
        return $res;
    }
}
