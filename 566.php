<?php
class Solution
{

    /**
     * @param Integer[][] $nums
     * @param Integer $r
     * @param Integer $c
     * @return Integer[][]
     */
    public function matrixReshape($nums, $r, $c)
    {
        $m = count($nums);
        $n = count($nums[0]);
        if ($r * $c != $m * $n) {
            return $nums;
        }

        $res = [];
        for ($i = 0; $i < $m * $n; $i++) {
            $res[$i / $c][$i % $c] = $nums[$i / $n][$i % $n];
        }
        return $res;

        // $m = count($nums);
        // $n = count($nums[0]);
        // if ($r * $c != $m * $n) {
        //     return $nums;
        // }

        // $rows = [];
        // for ($i = 0; $i < $m; $i++) {
        //     for ($j = 0; $j < $n; $j++) {
        //         $rows[] = $nums[$i][$j];
        //     }
        // }
        // $ans = [];
        // $k   = 0;
        // for ($i = 0; $i < $r; $i++) {
        //     $array = [];
        //     for ($j = 0; $j < $c; $j++) {
        //         $array[] = $rows[$k];
        //         $k++;
        //     }
        //     $ans[] = $array;
        // }
        // return $ans;
    }
}
