<?php
class Solution
{

    /**
     * @param Integer[] $deck
     * @return Boolean
     * @github https://github.com/yumindayu/leetcode-php


    输入：[1,2,3,4,4,3,2,1]
    输出：true
    [1,1,1,1,2,2,2,2,2]
     */
    public function hasGroupsSizeX($deck)
    {
        if (count($deck) <= 1) {
            return false;
        }

        $map = [];
        for ($i = 0; $i < count($deck); $i++) {
            $map[$deck[$i]] = isset($map[$deck[$i]]) ? $map[$deck[$i]] : 1;
        }
        $num = array_shift($map);
        foreach ($map as $v) {
            $num = $this->gcd($v, $num);
            if ($num == 1) {
                return false;
            }

        }
        return true;

    }

    public function gcd($x, $y)
    {
        return $y == 0 ? $x : $this->gcd($y, $x % $y);
    }

}
