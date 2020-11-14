<?php
class Solution
{

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    public function relativeSortArray($arr1, $arr2)
    {
        $upper     = max($arr1);
        $frequency = array_fill(0, $upper + 1, 0);
        foreach ($arr1 as $x) {
            $frequency[$x]++;
        }
        $ans   = array_fill(0, count($arr1), 0);
        $index = 0;
        foreach ($arr2 as $x) {
            for ($i = 0; $i < $frequency[$x]; $i++) {
                $ans[$index++] = $x;
            }
            $frequency[$x] = 0;
        }
        for ($x = 0; $x <= $upper; $x++) {
            for ($i = 0; $i < $frequency[$x]; $i++) {
                $ans[$index++] = $x;
            }
        }
        return $ans;
    }
}
