<?php
class Solution
{

    /**
     * @param String $S
     * @param String $T
     * @return Boolean
     */
    public function backspaceCompare($S, $T)
    {
        return $this->format($S) == $this->format($T);
    }

    public function format($str)
    {
        $stack = [];
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] != "#") {
                array_push($stack, $str[$i]);
            } else {
                array_pop($stack);
            }
        }
        return implode("", $stack);
    }
}
