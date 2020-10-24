<?php
class Solution
{

    /**
     * @param Integer[][] $clips
     * @param Integer $T
     * @return Integer
     */
    public function videoStitching($clips, $T)
    {
        $array = [];
        foreach ($clips as $clip) {
            $start = $clip[0];
            $end   = $clip[1];
            if (isset($array[$start])) {
                $array[$start] = max($array[$start], $end);
            } else {
                $array[$start] = $end;
            }
        }
        $num  = 0;
        $pre  = 0;
        $last = 0;
        for ($i = 0; $i < $T; $i++) {
            $last = max($last, $array[$i]);
            if ($i == $last) {
                return -1;
            }
            if ($i == $pre) {
                $num++;
                $pre = $last;
            }
        }
        return $num;

    }
}
