<?php
class Solution
{

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    public function insert($intervals, $newInterval)
    {
        $ret   = [];
        $start = $newInterval[0];
        $end   = $newInterval[1];
        foreach ($intervals as $interval) {
            if ($interval[0] > $end) {
                array_push($ret, [$start, $end]);
                $start = $interval[0];
                $end   = $interval[1];
            }
            if ($interval[0] > $end || $interval[1] < $start) {
                array_push($ret, $interval);
            } else {
                $start = min($start, $interval[0]);
                $end   = max($end, $interval[1]);
            }
        }
        array_push($ret, [$start, $end]);
        return $ret;
    }
}
