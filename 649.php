<?php
class Solution
{

    /**
     * @param String $senate
     * @return String
     */
    public function predictPartyVictory($senate)
    {
        $n       = strlen($senate);
        $radiant = [];
        $dire    = [];
        for ($i = 0; $i < $n; $i++) {
            if ($senate[$i] == "R") {
                array_push($radiant, $i);
            } else {
                array_push($dire, $i);
            }
        }
        while (!empty($radiant) && !empty($dire)) {
            $radiantIndex = $radiant[0];
            $direIndex    = $dire[0];
            if ($radiantIndex < $direIndex) {
                array_push($radiant, $radiantIndex + $n);
            } else {
                array_push($dire, $direIndex + $n);
            }
            array_shift($radiant);
            array_shift($dire);
        }
        return !empty($radiant) ? "Radiant" : "Dire";
    }
}
