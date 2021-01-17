<?php
class Solution
{

    /**
     * @param Integer[][] $coordinates
     * @return Boolean
     */
    public function checkStraightLine($coordinates)
    {
        $deltaX = $coordinates[0][0];
        $deltaY = $coordinates[0][1];
        $n      = count($coordinates);
        for ($i = 0; $i < $n; $i++) {
            $coordinates[$i][0] -= $deltaX;
            $coordinates[$i][1] -= $deltaY;
        }
        $A = $coordinates[1][1];
        $B = -$coordinates[1][0];
        for ($i = 2; $i < $n; $i++) {
            $x = $coordinates[$i][0];
            $y = $coordinates[$i][1];
            if ($A * $x + $B * $y != 0) {
                return false;
            }
        }
        return true;

    }
}
