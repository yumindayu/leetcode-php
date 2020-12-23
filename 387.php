<?php
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function firstUniqChar($s)
    {
        $map = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($map[$s[$i]])) {
                $map[$s[$i]] = "repeat";
            } else {
                $map[$s[$i]] = $i;
            }
        }
        foreach ($map as $char => $index) {
            if ($index !== "repeat") {
                return $index;
            }
        }
        return -1;
    }
}
