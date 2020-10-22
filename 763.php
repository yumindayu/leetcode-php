<?php
class Solution
{

    /**
     * @param String $S
     * @return Integer[]
     */
    public function partitionLabels($S)
    {
        $indexArray = [];
        for ($i = 0; $i < strlen($S); $i++) {
            if (isset($indexArray[$S[$i]])) {
                $indexArray[$S[$i]] = max($indexArray[$S[$i]], $i);
            } else {
                $indexArray[$S[$i]] = $i;
            }
        }
        $ans   = [];
        $start = 0;
        foreach ($indexArray as $k => $index) {
            if (isset($visited[$k])) {
                continue;
            }
            $max = $index;
            $i   = $start;
            while ($i <= $max) {
                $visited[$S[$i]] = 1;
                $max             = max($max, $indexArray[$S[$i]]);
                $i++;
            }
            array_push($ans, $max - $start + 1);
            $start = $max + 1;
        }
        return $ans;
    }
}
