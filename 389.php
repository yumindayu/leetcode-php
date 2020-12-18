<?php
class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    public function findTheDifference($s, $t)
    {
        $sum = 0;
        for ($i = 0; $i < strlen($t); ++$i) {
            $sum += ord($t[$i]);
        }

        for ($i = 0; $i < strlen($s); ++$i) {
            $sum -= ord($s[$i]);
        }

        return chr($sum);
    }
}
