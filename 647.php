<?php
class Solution
{

    /**
     * 中心扩散法
     * @param String $s
     * @return Integer
     */
    public function countSubstrings($s)
    {
        $ans = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $ans += $this->valid($s, $i, $i);
            if ($i == strlen($s) - 1) {
                continue;
            }

            $ans += $this->valid($s, $i, $i + 1);
        }
        return $ans;
    }

    public function valid($s, $l, $r)
    {
        $count = 0;
        while ($l >= 0 && $r < strlen($s) && $s[$l] == $s[$r]) {
            $l--;
            $r++;
            $count++;
        }
        return $count;
    }
}
