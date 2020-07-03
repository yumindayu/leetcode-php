<?php
class Solution
{

    /**
     * @param String $num
     * @param Integer $k
     * @return String
     */
    public function removeKdigits($num, $k)
    {
        $stack = [];
        $m     = $k;
        for ($i = 0; $i < strlen($num); $i++) {
            while ($k && !empty($stack) && $num[$i] < end($stack)) {
                array_pop($stack);
                $k--;
            }
            array_push($stack, $num[$i]);
        }
        $final_stack = $k ? array_slice($stack, 0, count($stack) - $k) : $stack;
        while ($final_stack[0] == "0") {
            array_shift($final_stack);
        }
        return empty($final_stack) ? "0" : implode("", $final_stack);
    }
}
