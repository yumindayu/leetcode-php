<?php
class Solution
{

    /**
     * @param Integer[][] $A
     * @return Integer[][]
     */
    public function flipAndInvertImage($A)
    {
        $n = count($A);
        for ($i = 0; $i < $n; $i++) {
            $l = 0;
            $r = $n - 1;
            while ($l < $r) {
                if ($A[$i][$l] == $A[$i][$r]) {
                    $A[$i][$l] ^= 1;
                    $A[$i][$r] ^= 1;
                }
                $l++;
                $r--;
            }
            if ($l == $r) {
                $A[$i][$l] ^= 1;
            }
        }
        return $A;
    }
}
