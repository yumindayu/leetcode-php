<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    public function minIncrementForUnique($A)
    {
        sort($A);
        $count = 0;
        for ($i = 1; $i < count($A); $i++) {
            if ($A[$i] <= $A[$i - 1]) {
                $count += $A[$i - 1] - $A[$i] + 1;
                $A[$i] = $A[$i - 1] + 1;
            }
        }
        return $count;
    }
}
