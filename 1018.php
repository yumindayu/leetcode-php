<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @return Boolean[]
     */
    public function prefixesDivBy5($A)
    {
        $res = [];
        for ($i = 0; $i < count($A); $i++) {
            $prefix = (($prefix << 1) + $A[$i]) % 5;
            $res[]  = !$prefix;
        }
        return $res;
    }
}
