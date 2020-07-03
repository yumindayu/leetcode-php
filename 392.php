<?php
class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isSubsequence($s, $t)
    {
        $i = $j = 0;

        while ($i < strlen($s) && $j < strlen($t)) {
            if ($s[$i] == $t[$j]) {
                $i++;
                $j++;
            } else {
                $j++;
            }
        }
        return $i == strlen($s);
    }
}
