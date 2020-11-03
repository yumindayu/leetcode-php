<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    public function validMountainArray($A)
    {
        $top = 0;
        $n   = count($A);
        for ($i = 1; $i < $n; $i++) {
            if ($A[$i] < $A[$i - 1]) {
                $top = $i - 1;
                break;
            }
        }
        if ($top == 0 || $top == $n - 1) {
            return false;
        }

        for ($i = $top; $i + 1 < $n; $i++) {
            if ($A[$i + 1] >= $A[$i]) {
                return false;
            }
        }
        return true;
    }
}
