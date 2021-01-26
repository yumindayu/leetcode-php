<?php
class Solution
{

    /**
     * @param Integer[][] $dominoes
     * @return Integer
     */
    public function numEquivDominoPairs($dominoes)
    {
        $num = [];
        $ans = 0;
        foreach ($dominoes as $domino) {
            $val = $domino[0] < $domino[1] ? $domino[0] * 10 + $domino[1] : $domino[1] * 10 + $domino[0];
            $ans += $num[$val];
            $num[$val]++;
        }
        return $ans;

    }
}
