<?php
class Solution
{

    /**
     * @param Integer[][] $A
     * @param Integer[][] $B
     * @return Integer[][]
     */
    public function intervalIntersection($A, $B)
    {
        $i   = 0;
        $j   = 0;
        $res = [];
        while ($i < count($A) && $j < count($B)) {
            $a1 = $A[$i][0];
            $a2 = $A[$i][1];

            $b1 = $B[$j][0];
            $b2 = $B[$j][1];
            //交集
            if ($b2 >= $a1 && $a2 >= $b1) {
                array_push($res, [max($a1, $b1), min($a2, $b2)]);
            }
            if ($b2 < $a2) {
                $j++;
            } else {
                $i++;
            }
        }
        return $res;
    }
}
