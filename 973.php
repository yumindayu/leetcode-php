<?php
class Solution
{

    /**
     * @param Integer[][] $points
     * @param Integer $K
     * @return Integer[][]
     */
    public function kClosest($points, $K)
    {
        if ($K <= 0) {
            return [];
        }

        $n = count($points);
        if ($K >= $n) {
            return $points;
        }

        $heap = new SplPriorityQueue();
        foreach ($points as $point) {
            $distance = $point[0] * $point[0] + $point[1] * $point[1];
            $heap->insert($point, -$distance);
        }

        $ans = [];
        for ($i < 0; $i < $K; $i++) {
            $ans[] = $heap->extract();
        }
        return $ans;

    }
}
