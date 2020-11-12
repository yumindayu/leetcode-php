<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    public function sortArrayByParityII($A)
    {
        $left  = [];
        $right = [];
        for ($i = 0; $i < count($A); $i++) {
            if ($A[$i] & 1) {
                $right[] = $A[$i];
            } else {
                $left[] = $A[$i];
            }
        }
        $result = [];
        for ($i = 0; $i < count($left); $i++) {
            $result[] = $left[$i];
            $result[] = $right[$i];
        }
        return $result;
    }
}
