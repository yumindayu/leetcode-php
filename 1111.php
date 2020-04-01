<?php
class Solution
{

    /**
     * @param String $seq
     * @return Integer[]
     */
    public function maxDepthAfterSplit($seq)
    {
        $index = 0;
        $res   = [];
        for ($i = 0; $i < strlen($seq); $i++) {
            if ($seq[$i] == "(") {
                $ret++;
                $res[] = $ret % 2 == 1 ? 0 : 1;
            } else {
                $ret--;
                $res[] = $ret % 2 == 1 ? 1 : 0;
            }
        }
        return $res;
    }
}
