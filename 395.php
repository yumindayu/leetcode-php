<?php
class Solution
{

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    public function longestSubstring($s, $k)
    {
        if ($k <= 1) {
            return strlen($s);
        }

        if ($s == "" || strlen($s) < $k) {
            return 0;
        }

        $map = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($map[$s[$i]])) {
                $map[$s[$i]]++;
            } else {
                $map[$s[$i]] = 1;
            }
        }
        $i = 0;
        while ($i < strlen($s) && $map[$s[$i]] >= $k) {
            $i++;
        }
        if ($i == strlen($s)) {
            return strlen($s);
        }

        $l = $this->longestSubstring(substr($s, 0, $i), $k);

        while ($i < strlen($s) && $map[$s[$i]] < $k) {
            $i++;
        }
        $r = $this->longestSubstring(substr($s, $i), $k);

        return max($l, $r);
    }
}
