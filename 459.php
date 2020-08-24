<?php
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function repeatedSubstringPattern($s)
    {
        return strpos(substr($s . $s, 1, strlen($s) * 2 - 2), $s) !== false;
    }
}
