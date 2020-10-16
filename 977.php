<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    public function sortedSquares($A)
    {
        $i     = 0;
        $j     = count($A) - 1;
        $index = count($A) - 1;
        $ans   = array_fill(0, count($A), 0);
        while ($i <= $j) {
            if ($A[$i] * $A[$i] > $A[$j] * $A[$j]) {
                $ans[$index] = $A[$i] * $A[$i];
                $i++;
            } else {
                $ans[$index] = $A[$j] * $A[$j];
                $j--;
            }
            $index--;
        }
        return $ans;
    }
}
