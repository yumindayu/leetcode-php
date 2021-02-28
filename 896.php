<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    public function isMonotonic($A)
    {
        $n    = count($A);
        $up   = 0;
        $down = 0;
        for ($i = 0; $i < $n - 1; $i++) {
            if ($A[$i] < $A[$i + 1]) {
                $up = 1;
            } elseif ($A[$i] > $A[$i + 1]) {
                $down = 1;
            }
        }
        return $up + $down == 2 ? false : true;
    }
}
