<?php
class Solution
{

    /**
     * @param String $S
     * @return String
     */
    public function removeDuplicates($S)
    {
        $stack = [];
        for ($i = 0; $i < strlen($S); $i++) {
            if (!empty($stack) && end($stack) == $S[$i]) {
                array_pop($stack);
            } else {
                array_push($stack, $S[$i]);
            }
        }
        return implode("", $stack);
    }
}
