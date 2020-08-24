<?php
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function repeatedSubstringPattern($s)
    {
        $n = strlen($s);
        for ($i = 1; $i * 2 <= $n; $i++) {
            if ($n % $i == 0) {
                $match = true;
                for ($j = $i; $j < $n; $j++) {
                    if ($s[$j] != $s[$j - $i]) {
                        $match = false;
                        break;
                    }
                }
                if ($match) {
                    return true;
                }

            }
        }
        return false;
    }
}
