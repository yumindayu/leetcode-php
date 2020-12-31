<?php
class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    public function eraseOverlapIntervals($intervals)
    {
        $count = count($intervals);
        if ($count == 0) {
            return 0;
        }

        usort($intervals, function ($a, $b) {
            return $a[1] < $b[1] ? -1 : 1;
        });
        $max = $intervals[0][1];
        $num = 1;
        for ($i = 1; $i < $count; $i++) {
            if ($intervals[$i][0] >= $max) {
                $num++;
                $max = $intervals[$i][1];
            }
        }
        return $count - $num;

    }
}
