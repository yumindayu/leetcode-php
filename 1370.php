<?php
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function sortString($s)
    {
        $num = array_fill(0, 26, 0);
        for ($i = 0; $i < strlen($s); $i++) {
            $num[ord($s[$i]) - ord('a')]++;
        }
        $ans = "";
        while (strlen($ans) < strlen($s)) {
            for ($i = 0; $i < 26; $i++) {
                if ($num[$i] > 0) {
                    $ans = $ans . chr($i + ord('a'));
                    $num[$i]--;
                }
            }
            for ($i = 25; $i >= 0; $i--) {
                if ($num[$i] > 0) {
                    $ans = $ans . chr($i + ord('a'));
                    $num[$i]--;
                }
            }
        }
        return $ans;
    }
}
