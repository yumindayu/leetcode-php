<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    public function minKBitFlips($A, $K)
    {
        $n   = count($A);
        $que = [];
        $res = 0;
        for ($i = 0; $i < $n; $i++) {
            if (!empty($que) && $i >= $que[0] + $K) {
                array_shift($que);
            }
            if (count($que) % 2 == $A[$i]) {
                if ($i + $K > $n) {
                    return -1;
                }

                array_push($que, $i);
                $res++;
            }
        }

        return $res;
    }
}
