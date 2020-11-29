<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    public function largestPerimeter($A)
    {
        sort($A);
        for ($i = count($A) - 1; $i >= 2; $i--) {
            if ($A[$i - 2] + $A[$i - 1] > $A[$i]) {
                return $A[$i - 2] + $A[$i - 1] + $A[$i];
            }
        }
        return 0;

    }
}
