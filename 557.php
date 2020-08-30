<?php
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function reverseWords($s)
    {
        return implode(" ", array_map(function ($a) {return strrev($a);}, explode(" ", $s)));
    }
}
