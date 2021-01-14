<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Boolean[]
     */
    public function prefixesDivBy5($A)
    {
        $res    = [];
        $prefix = 0;
        for ($i = 0; $i < count($A); $i++) {
            $prefix = (($prefix << 1) + $A[$i]) % 5;
            $res[]  = !$prefix;
        }
        return $res;
    }
}
