<?php
class Solution
{

    /**
     * @param String $J
     * @param String $S
     * @return Integer
     */
    public function numJewelsInStones($J, $S)
    {
        $map = [];
        for ($i = 0; $i < strlen($J); $i++) {
            $map[$J[$i]] = true;
        }
        $count = 0;
        for ($i = 0; $i < strlen($S); $i++) {
            if (isset($map[$S[$i]])) {
                $count++;
            }
        }
        return $count;
    }
}
