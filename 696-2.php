<?php
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function countBinarySubstrings($s)
    {
        $pre = 0;
        $cur = 1;
        $res = 0;
        for ($i = 1; $i < strlen($s); $i++) {
            if ($s[$i] == $s[$i - 1]) {
                $cur++;
            } else {
                $pre = $cur;
                $cur = 1;
            }
            if ($pre >= $cur) {
                $res++;
            }
        }
        return $res;
    }
}
