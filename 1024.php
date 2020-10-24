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
        $array = array_flip(0, $T, 0);
        foreach ($clips as $clip) {
            $array[$clip[0]] = max($array[$clip[0]], $clip[1]);
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
