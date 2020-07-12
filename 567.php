<?php
class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    public function checkInclusion($s1, $s2)
    {
        $need   = [];
        $window = [];
        for ($i = 0; $i < strlen($s1); $i++) {
            if (isset($need[$s1[$i]])) {
                $need[$s1[$i]] += 1;
            } else {
                $need[$s1[$i]] = 1;
            }
        }
        $left  = 0;
        $right = 0;
        $valid = 0;

        while ($right < strlen($s2)) {
            $temp = $s2[$right];
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
            while ($right - $left >= strlen($s1)) {
                if ($valid == count($need)) {
                    return true;
                }

                $tempDel = $s2[$left];
                $left++;
                if (isset($need[$tempDel])) {
                    if ($window[$tempDel] == $need[$tempDel]) {
                        $valid--;
                    }
                    $window[$tempDel]--;
                }
            }
        }
        return false;
    }
}
