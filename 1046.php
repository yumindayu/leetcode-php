<?php
class Solution
{

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    public function lastStoneWeight($stones)
    {
        while (count($stones) > 1) {
            sort($stones);
            $x = array_pop($stones);
            $y = array_pop($stones);
            if ($x == $y) {
                continue;
            }
            $z = abs($x - $y);
            array_push($stones, $z);
        }
        return empty($stones) ? 0 : $stones[0];
    }
}
