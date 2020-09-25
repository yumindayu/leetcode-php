<?php
class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    public function removeCoveredIntervals($intervals)
    {
        // sort($intervals);
        usort($intervals, function ($a, $b) {
            if ($a[0] == $b[0]) {
                return $b[1] - $a[1];
            }
            return $a[0] - $b[0];
        });
        $start = $intervals[0][0];
        $end   = $intervals[0][1];
        $total = count($intervals);
        array_shift($intervals);
        $count = 0;
        foreach ($intervals as $interval) {
            if ($start <= $interval[0] && $interval[1] <= $end) {
                $count++;
            } else {
                $start = $interval[0];
                $end   = $interval[1];
            }
        }
        return $total - $count;
    }
}
