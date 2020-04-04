<?php
class Solution
{

    /**
     * @param Integer[][] $heightMap
     * @return Integer
     */
    public function trapRainWater($heightMap)
    {
        $m = count($heightMap);
        $n = count($heightMap[0]);

        $res       = 0;
        $max       = PHP_INT_MIN;
        $visited   = [];
        $direction = [[0, -1], [-1, 0], [0, 1], [1, 0]];
        $queue     = new PQ();
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == 0 || $j == 0 || $i == $m - 1 || $j == $n - 1) {
                    $queue->insert([$i, $j], $heightMap[$i][$j]);
                    $visited[$i][$j] = true;
                }
            }
        }
        $queue->setExtractFlags(PQ::EXTR_BOTH);

        while (!$queue->isEmpty()) {
            $data   = $queue->extract();
            $height = $data['priority'];
            $row    = $data['data'][0];
            $col    = $data['data'][1];
            $max    = max($max, $height);
            for ($i = 0; $i < 4; $i++) {
                $x = $row + $direction[$i][0];
                $y = $col + $direction[$i][1];
                if ($x < 0 || $x >= $m || $y < 0 || $y >= $n || (isset($visited[$x][$y]))) {
                    continue;
                }
                $visited[$x][$y] = true;
                if ($heightMap[$x][$y] < $max) {
                    $res += $max - $heightMap[$x][$y];
                }
                $queue->insert([$x, $y], $heightMap[$x][$y]);
            }
        }
        return $res;

    }

}

class PQ extends \SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) {
            return 0;
        }

        return $priority1 < $priority2 ? 1 : -1;
    }
}
