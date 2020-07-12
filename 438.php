<?php
class Solution
{

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    public function findAnagrams($s, $p)
    {
        $need   = [];
        $window = [];
        $ans    = [];
        for ($i = 0; $i < strlen($p); $i++) {
            if (isset($need[$p[$i]])) {
                $need[$p[$i]] += 1;
            } else {
                $need[$p[$i]] = 1;
            }
        }
        $left  = 0;
        $right = 0;
        $valid = 0;

        while ($right < strlen($s)) {
            $temp = $s[$right];
            $right++;
            if (isset($need[$temp])) {
                if (isset($window[$temp])) {
                    $window[$temp] += 1;
                } else {
                    $window[$temp] = 1;
                }
                if ($window[$temp] == $need[$temp]) {
                    $valid++;
                }
            }
            while ($right - $left >= strlen($p)) {
                if ($valid == count($need)) {
                    array_push($ans, $left);
                }

                $tempDel = $s[$left];
                $left++;
                if (isset($need[$tempDel])) {
                    if ($window[$tempDel] == $need[$tempDel]) {
                        $valid--;
                    }
                    $window[$tempDel]--;
                }
            }
        }
        return $ans;
    }
}
