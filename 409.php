<?php
class Solution
{

    /**
     * @param String $s
     * @return Integer
     * @github https://github.com/yumindayu/leetcode-php

    输入:  "abccccdd"
    输出: 7
    "dccaccd"

    abc cba
    abc d cba

    [a=>1,b=>1,c=>5,d=>2]


     */
    public function longestPalindrome($s)
    {
        $map = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $map[$s[$i]] = isset($map[$s[$i]]) ? $map[$s[$i]] + 1 : 1;
        }

        $length = 0;
        foreach ($map as $v) {
            $length += floor($v / 2) * 2;
        }
        return $length < strlen($s) ? $length + 1 : $length;

    }
}
