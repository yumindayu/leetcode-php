<?php
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function countBinarySubstrings($s)
    {
        $array = [];
        $pre   = $s[0];
        $count = 1;
        for ($i = 1; $i < strlen($s); $i++) {
            if ($s[$i] == $pre) {
                $count++;
            } else {
                array_push($array, $count);
                $count = 1;
                $pre   = $s[$i];
            }
        }
        array_push($array, $count);

        $res = 0;
        for ($i = 0; $i < count($array) - 1; $i++) {
            $res += min($array[$i], $array[$i + 1]);
        }
        return $res;
    }
}
