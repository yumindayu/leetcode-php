<?php
class Solution
{

    /**
     * @param String[] $A
     * @return String[]
     */
    public function commonChars($A)
    {
        $ans     = [];
        $minfreq = array_fill(0, 26, PHP_INT_MAX);
        foreach ($A as $word) {
            $freg   = array_fill(0, 26, 0);
            $length = strlen($word);
            for ($i = 0; $i < $length; $i++) {
                $freg[ord($word[$i]) - ord('a')]++;
            }
            for ($i = 0; $i < 26; $i++) {
                $minfreq[$i] = min($minfreq[$i], $freg[$i]);
            }
        }
        for ($i = 0; $i < 26; $i++) {
            for ($j = 0; $j < $minfreq[$i]; $j++) {
                array_push($ans, chr($i + ord('a')));
            }
        }
        return $ans;
    }
}
