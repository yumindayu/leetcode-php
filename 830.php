<?php
class Solution
{

    /**
     * @param String $s
     * @return Integer[][]
     */
    public function largeGroupPositions($s)
    {
        $ans   = [];
        $start = 0;
        $count = 1;
        for ($i = 1; $i < strlen($s); $i++) {
            if ($s[$i] == $s[$i - 1]) {
                $count++;
            } else {
                if ($count >= 3) {
                    array_push($ans, [$start, $i - 1]);
                }
                $start = $i;
                $count = 1;
            }
        }
        if ($count >= 3) {
            array_push($ans, [$start, strlen($s) - 1]);
        }
        return $ans;
    }
}
