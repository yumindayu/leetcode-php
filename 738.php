<?php
class Solution
{

    /**
     * @param Integer $N
     * @return Integer
     */
    public function monotoneIncreasingDigits($N)
    {
        $nums  = str_split($N);
        $count = count($nums);
        $flag  = $count;
        for ($i = $count - 1; $i >= 1; $i--) {
            if ($nums[$i] < $nums[$i - 1]) {
                $flag = $i;
                $nums[$i - 1]--;
            }
        }
        for ($i = $flag; $i < $count; $i++) {
            $nums[$i] = "9";
        }
        return intval(implode("", $nums));

    }
}
