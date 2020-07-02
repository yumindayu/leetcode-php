<?php
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    public function kthSmallest($matrix, $k)
    {
        $n = count($matrix) - 1;
        $l = $matrix[0][0];
        $r = $matrix[$n][$n];

        while ($l < $r) {
            $mid   = floor(($r - $l) / 2) + $l;
            $count = $this->countLessThanMid($matrix, $mid, $n);
            if ($count < $k) {
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
        }
        return $r;
    }

    public function countLessThanMid($matrix, $mid, $n)
    {
        $i     = $n;
        $j     = 0;
        $count = 0;
        while ($i >= 0 && $j <= $n) {
            if ($matrix[$i][$j] <= $mid) {
                $count += $i + 1;
                $j++;
            } else {
                $i--;
            }
        }
        return $count;
    }
}
