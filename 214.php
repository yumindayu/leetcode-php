<?php
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function shortestPalindrome($s)
    {
        $max_right = -PHP_INT_MAX;
        for ($i = 1; $i <= strlen($s); $i++) {
            $ret = $this->isPalindrome(substr($s, 0, $i));
            if ($ret) {
                $max_right = max($max_right, $i);
            }
        }
        if ($max_right == strlen($s)) {
            return $s;
        }

        $max_right = $max_right == 0 ? 1 : $max_right;
        $str       = substr($s, $max_right);
        $new_str   = "";
        for ($i = strlen($str) - 1; $i >= 0; $i--) {
            $new_str .= $str[$i];
        }
        return $new_str . $s;
    }

    private function isPalindrome($s)
    {
        $low  = 0;
        $high = strlen($s) - 1;
        while ($low <= $high) {
            if ($s[$low] != $s[$high]) {
                return false;
            }
            $low++;
            $high--;
        }
        return true;
    }
}
