<?php
class Solution
{
    public function allCellsDistOrder($R, $C, $r0, $c0)
    {
        $ans = [];
        for ($i = 0; $i < $R; $i++) {
            for ($j = 0; $j < $C; $j++) {
                $ans[$i * $C + $j] = [$i, $j];
            }
        }
        usort($ans, function ($a, $b) use ($r0, $c0) {
            return (abs($a[0] - $r0) + abs($a[1] - $c0)) - (abs($b[0] - $r0) + abs($b[1] - $c0));
        });
        return $ans;

    }

    public function allCellsDistOrder2($R, $C, $r0, $c0)
    {
        $map = [];
        for ($i = 0; $i < $R; ++$i) {
            for ($j = 0; $j < $C; ++$j) {
                $distance         = abs($r0 - $i) + abs($c0 - $j);
                $map[$distance][] = [$i, $j];
            }
        }

        $answer = [];
        for ($k = 0; $k < $R + $C; ++$k) {
            if (isset($map[$k])) {
                foreach ($map[$k] as $value) {
                    $answer[] = $value;
                }
            }
        }

        return $answer;
    }
}
