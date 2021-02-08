<?php
class Solution
{

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    public function maxTurbulenceSize($arr)
    {
        $count = count($arr);
        $up    = 1;
        $down  = 1;
        $ans   = 1;
        for ($i = 1; $i < $count; $i++) {
            if ($arr[$i] > $arr[$i - 1]) {
                $up   = $down + 1;
                $down = 1;
            } elseif ($arr[$i] < $arr[$i - 1]) {
                $down = $up + 1;
                $up   = 1;
            } else {
                $up   = 1;
                $down = 1;
            }
            $ans = max($ans, max($up, $down));
        }
        return $ans;
    }
}
