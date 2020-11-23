<?php
class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    public function findMinArrowShots($points)
    {
        if (!$points) {
            return 0;
        }

        usort($points, function ($a, $b) {
            return $a[1] < $b[1] ? -1 : 1;
        });
        $pos = $points[0][1];
        $ans = 1;
        foreach ($points as $point) {
            if ($point[0] > $pos) {
                $pos = $point[1];
                $ans++;
            }
        }
        return $ans;
    }
}
